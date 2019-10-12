$(document).ready(function()) {
	var
	var cardstate;
	var qbank = new Array;

	loadDB();

	function loadDB() {
		$.getJSON("../assets/data/flashcards.json"), function(data) {
			for(i=0; i <data.questionlist.length;i++) {
				qbank[i] = [];
				qbank[i][0]=data.questionlist[i].cardfront;
				qbank[i][1]=data.questionlist[i].cardback;
			}
			beginActivity();
		}
	}

	function beginActivity() {
		cardstate = 0;
		
	}

}
