
<link rel="stylesheet"
      href="{{ url('onlinetest/css') }}/custom-css.css"/>

 <h3 class="page-title">
<!-- @lang('quickadmin.laravel-quiz')    -->
 </h3>
 <h1>GENERAL KNOWLEDGE/ IQ TEST </h1>
    {!! Form::open(['method' => 'POST', 'route' => ['tests.store']]) !!}
 {!! Form::hidden('topic_id', $topic->id) !!}
  {!! Form::hidden('user_id', $user->id) !!}
      <nav class="col-lg-1 pull-right">
          <div class="sidebar-nav-fixed affix">
            <h1><b>Time <span id="clock" ></span> minute(s) left</b>  Total time <span style="color: red;" >{{$topic->timer}}</span>  </h1> <br> 

          </div>
        </nav>
<div class="testdropdown"></div>
<div class="quiz-container">
    <div class="panel panel-default">
        <div class="panel-heading">
          <!--  @lang('quickadmin.quiz')-->
        </div>

        <?php //dd($questions) ?>
    @if(count($questions) > 0)
    
        <?php $i = 1; ?>
        @foreach($questions as $question)
            @if ($i > 1)  @endif
           
 <div class="slide"> 
 <table width="70%" align="center">
   <tr>
     <td><strong>Question {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong> 

                        @if ($question->code_snippet != '')
                            <div class="code_snippet">{!! $question->code_snippet !!}</div>
                        @endif</td>
   </tr>
   <tr>
  <td>
                        <input
                            type="hidden"
                            name="questions[{{ $i }}]"
                            value="{{ $question->id }}">

                    @foreach($question->options as $option)
                        <br> 
      <label class="radio-inline"> 
      <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}"> {{ $option->option }} </label>

                    @endforeach
     </td>
   </tr>
 </table>
                    
 </div>
   
        <?php $i++; ?>
        @endforeach
     
    @endif
    </div> 


  <div id="quiz"></div>
</div>
     
  
<button id="submit">Submit Question</button> 
    {!! Form::close() !!}
<button id="previous">Previous Question</button>
<button id="next">Next Question</button>



<script src="https://code.jquery.com/jquery.min.js"></script>  
 <script src="{{asset('onlinetest/js/jquery.cookie.js')}}"></script>
  <script src="{{asset('onlinetest/js/jquery.countdown.js')}}"></script>
  <script>
  var topic_id = {{$topic->id}};
  var timer = {{$topic->timer}};
  $(document).ready(function(){function e(e){(116==(e.which||e.keyCode)||82==(e.which||e.keyCode))&&e.preventDefault()}setTimeout(function(){$(".myQuestion:first-child").addClass("active")},2500),history.pushState(null,null,document.URL),window.addEventListener("popstate",function(){history.pushState(null,null,document.URL)}),$(document).on("keydown",e),setTimeout(function(){$(".nextbtn").click(function(){var e=$(".myQuestion.active");$(e).removeClass("active"),0==$(e).next().length?(Cookies.remove("time"),Cookies.set("done","Your Quiz is Over...!",{expires:1}),location.href="{{$topic->id}}/finish"):($(e).next().addClass("active"),$(".myForm")[0].reset())})},700);var i,o=(new Date).getTime()+6e4*timer;if(Cookies.get("time")&&Cookies.get("topic_id")==topic_id){i=Cookies.get("time");var t=o-i,n=o-t;$("#clock").countdown(n,{elapse:!0}).on("update.countdown",function(e){var i=$(this);e.elapsed?(Cookies.set("done","Your Quiz is Over...!",{expires:1}),Cookies.remove("time"),location.href="{{route('tests.store')}}"):i.html(e.strftime("<span>%M:%S</span>"))})}else Cookies.set("time",o,{expires:1}),Cookies.set("topic_id",topic_id,{expires:1}),$("#clock").countdown(o,{elapse:!0}).on("update.countdown",function(e){var i=$(this);e.elapsed?(Cookies.set("done","Your Quiz is Over...!",{expires:1}),Cookies.remove("time"),location.href="{{$topic->id}}/finish"):i.html(e.strftime("<span>%M:%S</span>"))})});
  </script>

 
 <!--{{$topic->id}}/finish start_quiz/{id}/finish  -->
    <script type="text/javascript">
     
(function() {
 
  const myQuestions = [
    {
      question: " ",
      answers: {
        
      },
      correctAnswer: ""
    },
     
  ];

  function buildQuiz() {
    // we'll need a place to store the HTML output
    const output = [];

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // we'll want to store the list of answer choices
      const answers = [];

      // and for each available answer...
      for (letter in currentQuestion.answers) {
        // ...add an HTML radio button
        answers.push(
          `<label>
             <input type="radio" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
           </label>`
        );
      }

      // add this question and its answers to the output
      output.push(
        `<div class="slide">
           <div class="question"> ${currentQuestion.question} </div>
           <div class="answers"> ${answers.join("")} </div>
         </div>`
      );
    });

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join("");
  }

  function showResults() {
    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll(".answers");

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // if answer is correct
      if (userAnswer === currentQuestion.correctAnswer) {
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].style.color = "lightgreen";
      } else {
        // if answer is wrong or blank
        // color the answers red
        answerContainers[questionNumber].style.color = "red";
      }
    });

    // show number of correct answers out of total
    resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
  }

  function showSlide(n) {
    slides[currentSlide].classList.remove("active-slide");
    slides[n].classList.add("active-slide");
    currentSlide = n;
    
    if (currentSlide === 0) {
      previousButton.style.display = "none";
    } else {
      previousButton.style.display = "inline-block";
    }
    
    if (currentSlide === slides.length - 1) {
      nextButton.style.display = "none";
      submitButton.style.display = "inline-block";
    } else {
      nextButton.style.display = "inline-block";
      submitButton.style.display = "none";
    }
  }

  function showNextSlide() {
    showSlide(currentSlide + 1);
  }

  function showPreviousSlide() {
    showSlide(currentSlide - 1);
  }

  const quizContainer = document.getElementById("quiz");
  const resultsContainer = document.getElementById("results");
  const submitButton = document.getElementById("submit");

  // display quiz right away
  buildQuiz();

  const previousButton = document.getElementById("previous");
  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  let currentSlide = 0;

  showSlide(0);

  // on submit, show results
  submitButton.addEventListener("click", showResults);
  previousButton.addEventListener("click", showPreviousSlide);
  nextButton.addEventListener("click", showNextSlide);
})();
    </script>
 
 
 
 