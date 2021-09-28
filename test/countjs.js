/* function for counting, when the user login */
function startCounter(){
    let seconds = 10;
    let total = 0;
    for (let i = 0; i <= 10; i++) {
      setTimeout(function timer() {
        let total = seconds -i;
        document.getElementById("timer").innerHTML =  "00 : "+total;

      }, i * 1000);
    }
  }
