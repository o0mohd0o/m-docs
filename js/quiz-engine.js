// Quiz Engine - Reusable quiz functionality
let userAnswers = [];
let quizSubmitted = false;

function initQuiz() {
    const container = document.getElementById('quizContainer');
    container.innerHTML = '';
    userAnswers = [];
    quizSubmitted = false;
    
    questions.forEach((q, index) => {
        const questionCard = document.createElement('div');
        questionCard.className = 'question-card';
        questionCard.id = `question-${index}`;
        
        let optionsHTML = '';
        q.options.forEach((option, optIndex) => {
            optionsHTML += `
                <label class="answer-option" id="option-${index}-${optIndex}">
                    <input type="radio" name="question${index}" value="${optIndex}" 
                           onchange="updateProgress()" ${quizSubmitted ? 'disabled' : ''}>
                    <span>${option}</span>
                </label>
            `;
        });
        
        questionCard.innerHTML = `
            <span class="question-number">Question ${index + 1}</span>
            <div class="question-text">${q.question}</div>
            ${optionsHTML}
            <div class="explanation" id="explanation-${index}">
                <strong><i class="fas fa-lightbulb"></i> Explanation:</strong><br>
                ${q.explanation}
            </div>
        `;
        
        container.appendChild(questionCard);
    });

    updateProgress();
    document.getElementById('submitBtn').style.display = 'block';
    document.getElementById('resultsCard').classList.remove('show');
}

function updateProgress() {
    const answered = document.querySelectorAll('input[type="radio"]:checked').length;
    const total = questions.length;
    const percentage = (answered / total) * 100;
    
    document.getElementById('progressText').textContent = `${answered}/${total}`;
    document.getElementById('progressBar').style.width = `${percentage}%`;
}

function submitQuiz() {
    if (quizSubmitted) return;

    // Collect answers
    userAnswers = [];
    let allAnswered = true;

    questions.forEach((q, index) => {
        const selected = document.querySelector(`input[name="question${index}"]:checked`);
        if (selected) {
            userAnswers.push(parseInt(selected.value));
        } else {
            userAnswers.push(null);
            allAnswered = false;
        }
    });

    if (!allAnswered) {
        alert('Please answer all questions before submitting.');
        return;
    }

    quizSubmitted = true;
    
    // Disable all inputs
    document.querySelectorAll('input[type="radio"]').forEach(input => {
        input.disabled = true;
    });

    // Show correct/incorrect answers
    let correctCount = 0;

    questions.forEach((q, index) => {
        const userAnswer = userAnswers[index];
        const correctAnswer = q.correct;
        const isCorrect = userAnswer === correctAnswer;

        if (isCorrect) {
            correctCount++;
        }

        // Mark user's answer
        const selectedOption = document.getElementById(`option-${index}-${userAnswer}`);
        if (selectedOption) {
            selectedOption.classList.add(isCorrect ? 'correct' : 'incorrect');
        }

        // Show correct answer if user was wrong
        if (!isCorrect) {
            const correctOption = document.getElementById(`option-${index}-${correctAnswer}`);
            correctOption.classList.add('correct-answer');
        }

        // Show explanation
        document.getElementById(`explanation-${index}`).classList.add('show');
    });

    // Calculate score
    const percentage = Math.round((correctCount / questions.length) * 100);
    
    // Show results
    showResults(correctCount, questions.length, percentage);
    
    // Hide submit button
    document.getElementById('submitBtn').style.display = 'none';
    
    // Scroll to results
    setTimeout(() => {
        document.getElementById('resultsCard').scrollIntoView({ behavior: 'smooth' });
    }, 500);
}

function showResults(correct, total, percentage) {
    const resultsCard = document.getElementById('resultsCard');
    const scoreCircle = document.getElementById('scoreCircle');
    const scoreText = document.getElementById('scoreText');
    const resultMessage = document.getElementById('resultMessage');
    const resultDetails = document.getElementById('resultDetails');

    // Set score
    scoreText.textContent = `${percentage}%`;

    // Set score circle color
    scoreCircle.className = 'score-circle';
    if (percentage >= 90) {
        scoreCircle.classList.add('score-excellent');
        resultMessage.textContent = '🎉 Excellent!';
        resultMessage.style.color = '#28a745';
    } else if (percentage >= 75) {
        scoreCircle.classList.add('score-good');
        resultMessage.textContent = '✅ Good Job!';
        resultMessage.style.color = '#17a2b8';
    } else if (percentage >= 60) {
        scoreCircle.classList.add('score-pass');
        resultMessage.textContent = '👍 Passed';
        resultMessage.style.color = '#ffc107';
    } else {
        scoreCircle.classList.add('score-fail');
        resultMessage.textContent = '📚 Keep Studying';
        resultMessage.style.color = '#dc3545';
    }

    resultDetails.textContent = `You answered ${correct} out of ${total} questions correctly.`;

    resultsCard.classList.add('show');
}

function retakeQuiz() {
    quizSubmitted = false;
    userAnswers = [];
    window.scrollTo({ top: 0, behavior: 'smooth' });
    initQuiz();
}

// Initialize quiz on page load
document.addEventListener('DOMContentLoaded', function() {
    initQuiz();
});
