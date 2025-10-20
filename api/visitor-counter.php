<?php
/**
 * Server-Side Visitor Counter API
 * Tracks real page visits using server-side file storage
 * Author: Mohamed Tawfik
 * Date: October 20, 2025
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Configuration
define('DATA_DIR', __DIR__ . '/../data');
define('VISITS_FILE', DATA_DIR . '/visits.json');
define('SESSION_TIMEOUT', 1800); // 30 minutes

// Create data directory if it doesn't exist
if (!file_exists(DATA_DIR)) {
    mkdir(DATA_DIR, 0755, true);
}

// Initialize visits file if it doesn't exist
if (!file_exists(VISITS_FILE)) {
    file_put_contents(VISITS_FILE, json_encode([
        'total' => 0,
        'pages' => [],
        'sessions' => []
    ]));
}

/**
 * Get visitor's unique identifier
 */
function getVisitorId() {
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
    return md5($ip . $userAgent);
}

/**
 * Check if this is a unique visit (not within session timeout)
 */
function isUniqueVisit($visitorId, $pageId, $sessions) {
    $sessionKey = $visitorId . '_' . $pageId;
    
    if (!isset($sessions[$sessionKey])) {
        return true;
    }
    
    $lastVisit = $sessions[$sessionKey];
    $timeSinceLastVisit = time() - $lastVisit;
    
    return $timeSinceLastVisit > SESSION_TIMEOUT;
}

/**
 * Record a page visit
 */
function recordVisit($pageId) {
    // Read current data with file lock
    $fp = fopen(VISITS_FILE, 'c+');
    if (flock($fp, LOCK_EX)) {
        $content = stream_get_contents($fp);
        $data = json_decode($content, true) ?: [
            'total' => 0,
            'pages' => [],
            'sessions' => []
        ];
        
        $visitorId = getVisitorId();
        
        // Check if this is a unique visit
        if (isUniqueVisit($visitorId, $pageId, $data['sessions'])) {
            // Initialize page data if it doesn't exist
            if (!isset($data['pages'][$pageId])) {
                $data['pages'][$pageId] = [
                    'count' => 0,
                    'last_visit' => null
                ];
            }
            
            // Increment counters
            $data['pages'][$pageId]['count']++;
            $data['pages'][$pageId]['last_visit'] = date('Y-m-d H:i:s');
            $data['total']++;
            
            // Update session
            $sessionKey = $visitorId . '_' . $pageId;
            $data['sessions'][$sessionKey] = time();
            
            // Clean up old sessions (older than 24 hours)
            $cutoff = time() - 86400;
            foreach ($data['sessions'] as $key => $timestamp) {
                if ($timestamp < $cutoff) {
                    unset($data['sessions'][$key]);
                }
            }
            
            // Write back to file
            ftruncate($fp, 0);
            rewind($fp);
            fwrite($fp, json_encode($data, JSON_PRETTY_PRINT));
        }
        
        flock($fp, LOCK_UN);
    }
    fclose($fp);
    
    return $data;
}

/**
 * Get visit statistics
 */
function getVisits($pageId = null) {
    if (!file_exists(VISITS_FILE)) {
        return ['total' => 0, 'page' => 0];
    }
    
    $data = json_decode(file_get_contents(VISITS_FILE), true);
    
    $result = [
        'total' => $data['total'] ?? 0,
        'page' => 0
    ];
    
    if ($pageId && isset($data['pages'][$pageId])) {
        $result['page'] = $data['pages'][$pageId]['count'];
        $result['last_visit'] = $data['pages'][$pageId]['last_visit'] ?? null;
    }
    
    return $result;
}

/**
 * Reset all counters (admin function)
 */
function resetCounters() {
    $data = [
        'total' => 0,
        'pages' => [],
        'sessions' => []
    ];
    file_put_contents(VISITS_FILE, json_encode($data, JSON_PRETTY_PRINT));
    return $data;
}

// Handle API requests
$action = $_GET['action'] ?? 'record';
$pageId = $_GET['page'] ?? 'unknown';

try {
    switch ($action) {
        case 'record':
            $data = recordVisit($pageId);
            $visits = getVisits($pageId);
            echo json_encode([
                'success' => true,
                'page_visits' => $visits['page'],
                'total_visits' => $visits['total'],
                'page_id' => $pageId
            ]);
            break;
            
        case 'get':
            $visits = getVisits($pageId);
            echo json_encode([
                'success' => true,
                'page_visits' => $visits['page'],
                'total_visits' => $visits['total'],
                'page_id' => $pageId
            ]);
            break;
            
        case 'reset':
            // Only allow reset from localhost or with a secret key
            $secretKey = $_GET['key'] ?? '';
            $allowedIp = $_SERVER['REMOTE_ADDR'] === '127.0.0.1' || $_SERVER['REMOTE_ADDR'] === '::1';
            
            if ($allowedIp || $secretKey === 'reset-mdocs-2025') {
                resetCounters();
                echo json_encode([
                    'success' => true,
                    'message' => 'All counters have been reset'
                ]);
            } else {
                http_response_code(403);
                echo json_encode([
                    'success' => false,
                    'error' => 'Unauthorized'
                ]);
            }
            break;
            
        default:
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'error' => 'Invalid action'
            ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
