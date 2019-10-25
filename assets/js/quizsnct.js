
var letters = ['A','B','C','D','E'];
var hit = false;
var q_score = 0;
var time = 0;
var unit = 100;
var intv_points = "";

function byId(e) {
	return document.getElementById(e);
}

function checkAnswer(e) {

	clearInterval(intv_points);

	if (e.parentNode.className == "c") {

		q_score += unit;
		byId("score").innerText = q_score;
		
		e.className = "correct";		
		confetti.start(3000);
		hit = true;

	} else {
		e.parentNode.className = "w";
		e.className = "incorrect";
	}

	disableWrongAnswers();

	setTimeout("nextQuestion()",5000);
	
}

function nextQuestion() {

	current++;

	if (current < questions.length) {
		resetQuiz();
		initQuiz();
	} else {
		byId("question_text").innerHTML = "Parabéns! Você marcou <span class='total'>" + q_score + "</span> pontos!";
		byId("user").innerHTML = '<center><a href="index.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect">Jogar novamente</a></center>';
		$.ajax({
		  url: "ranking.php",
		  data: "id="+id_user+"&s="+q_score,
		  success: function(response) {
		  	byId("ranking").innerHTML = response;
		  }
		});
		
	}

}

function resetQuiz() {
	byId("question_text").innerHTML = "";
	byId("question_options").innerHTML = "";
}

function disableWrongAnswers() {

	var lis = byId("question_options").getElementsByTagName('li');
	console.log(lis);
	for(i in lis) {
		if (lis[i].className == "") {
			lis[i].className = "disabled";
		} else if (lis[i].className == "c" && !hit) {
			lis[i].getElementsByTagName('a')[0].className = "errou";
		}
	}

	hit = false;


}

function setTema(t) {
	byId("tema").value = t;
}

function initQuiz() {

	intv_points = setInterval(function() {
		if (unit > 0) {
			unit--;	
		} else {
			clearInterval(intv_points);
		}
		
	},1000);

	byId("question_text").innerHTML = questions[current].pergunta;
	for(var i = 0; i < questions[current].respostas.length;i++) {
		var item = questions[current].respostas[i];
		var li = '<li class="' + ((item.correta == "1") ? "c":"") + '"><a href="#" onclick="checkAnswer(this)"><span>' + letters[i] + ')</span> ' + item.resposta + '</a></li>';
		byId("question_options").innerHTML += li;
	}

}

window.onload = function() {	
	initQuiz();	
}
