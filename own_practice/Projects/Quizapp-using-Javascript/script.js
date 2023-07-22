const quizDb = [{
    question: "Q1.HTML stands for...?",
    a: "Hypoo Text Markup Language",
    b: "Hyper Text Makeup Language",
    c: "Hyper Text Markup Language",
    d: "Hey Text Markup Langage",
    ans: "ans3"
}, {
    question: "Q2.CSS stands for...?",
    a: "Cas Style Sheet",
    b: "Cashcadeing Style Sheet",
    c: "Cashcadeing Style Shoot",
    d: "Cashcadeing Sattle Sheet",
    ans: "ans2"
}, {
    question: "Q3.W hich one is the first fully supported 64 - bit operating system?",
    a: "Windows Vista",
    b: "Mac",
    c: "Linux",
    d: "Windows XP",
    ans: "ans3"

}, {
    question: "Q4.Which of the following is not a web browser?",
    a: "Edge",
    b: "Safari",
    c: "Facebook",
    d: "Netscape navigator",
    ans: "ans3"
}, {
    question: "Q5.Which is the following shortcut key to save a file in Windows?",
    a: "CTRL+S",
    b: "CTRL+B",
    c: "CTRL+X",
    d: "CTRL+V",
    ans: "ans1"

}, {
    question: "Q6.JS stands for..",
    a: "Java",
    b: "Jquery",
    c: "Javascript",
    d: "JSON",
    ans: "ans3"

}];
//console.log(quizDb[0].question);
const question = document.querySelector('.question');
const option1 = document.querySelector('#option1');
const option2 = document.querySelector('#option2');
const option3 = document.querySelector('#option3');
const option4 = document.querySelector('#option4');
const submit = document.querySelector('#submit');
const answers = document.querySelectorAll('.answer');
const showScore = document.querySelector('#showScore');
let questionCount = 0;
let score = 0;
const loadQuestion = () => {
    const questionList = quizDb[questionCount];
    question.innerText = questionList.question;
    option1.innerText = questionList.a;
    option2.innerText = questionList.b;
    option3.innerText = questionList.c;
    option4.innerText = questionList.d;
}
loadQuestion();
const getAnswer = () => {
    let answer;
    answers.forEach((curAns) => {
        if (curAns.checked) {
            answer = curAns.id;
        }
    });
    return answer;
};
const deselectAll = () => {
    answers.forEach((curAns) => curAns.checked = false);
};
submit.addEventListener('click', () => {
    const checkedAnswer = getAnswer();
    //console.log(checkedAnswer);
    if (checkedAnswer === quizDb[questionCount].ans) {
        score++;
    }
    deselectAll();
    questionCount++;
    if (questionCount < quizDb.length) {
        loadQuestion();
    } else {
        if (score == 0) {
            showScore.innerHTML = `<h3> Your Score is ${score}/${quizDb.length} 😒</h3>
            <button class="btn" onclick="location.reload()">Play Again</button>`;
        } else if (score >= 1 && score <= 5) {
            showScore.innerHTML = `<h3> Your Score is ${score}/${quizDb.length} 🙂</h3>
        <button class="btn" onclick="location.reload()">Play Again</button>`;
        } else {
            showScore.innerHTML = `<h3> Your Score is ${score}/${quizDb.length} 🤩</h3>
            <button class="btn" onclick="location.reload()">Play Again</button>`;
        }


        showScore.classList.remove('scoreArea');
    }
});
