<?php
require 'connect.php';
// Check connection
//echo "connected"s
$id=$_SESSION["id"];
    //$coin="";
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        //if(isset($_POST["coin"])){
            $coin = $_POST['coin'];
            echo "testing2";
            mysqli_query($conn,"UPDATE user_info SET coins='$coin' WHERE id='$id'");
            echo "testing3";
        //}
    }
    
   
?>

<!DOCTYPE html>
<html>
<link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet'>

<head>
    <link rel="stylesheet" href="quiz.css">
    <link rel="stylesheet" href="navbar.css">

    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
</head>
<body class="background-image">
<ul>
        <li><a href="landing.php">Home</a></li>
        <li style="float:right"><a href="logout.php">Log Out</a></li>
        <li style="float:right"><a href="stores.html">Stores</a></li>
        <li style="float:right"><a href="plant.php">Plant</a></li>
        <li style="float:right"><a href="quiz.php">Quiz</a></li>
      </ul>
      
<h2>Find out how eco-friendly you have been today!</h2>
    <form id="quizform" method="post" action="landing.php">
        <div class="q1">
            <label>1 What mode of transportation did you use today?</label><br>
            <div class="answers">
            <input type="checkbox" name="transport" value="bike" onclick="calculateTotal()">
            <label for="vehicle1"> Bike/Walking</label><br>
            <input type="checkbox"  name="transport" value="car" onclick="calculateTotal()">
            <label for="vehicle2"> Car</label><br>
            <input type="checkbox" name="transport" value="public" onclick="calculateTotal()">
            <label for="vehicle3"> Public Transportation</label>
            </div>
            <br><button class = "button" id="next1" type="button">Next</button>
        </div>

        <div class="q2">
            <label>2 How much did you travel by car/motorcycle today?</label><br>
            <div class="answers">
            <input type="radio" name="travel" value="none" onclick="calculateTotal()">
            <label for="html">none</label><br>
            <input type="radio" name="travel" value="less10" onclick="calculateTotal()">
            <label for="css">Less than 10 mines</label><br>
            <input type="radio" name="travel" value="less20" onclick="calculateTotal()">
            <label for="javascript">Less than 20 miles</label>
            <input type="radio" name="travel" value="more20" onclick="calculateTotal()">
            <label for="javascript">More than 20 miles</label>
            </div>
            <br><button class = "button" id="back2" type="button">Back</button>
            <button class = "button" id="next2" type="button">Next</button>
        </div>

        <div class="q3">
            <label>3 What type of diet did you consume today?</label><br>
            <div class="answers">
            <input type="radio" name="diet" value="animal" onclick="calculateTotal()">
            <label for="vehicle1"> Animal-based</label><br>
            <input type="radio"  name="diet" value="plant" onclick="calculateTotal()">
            <label for="vehicle2"> Plant-based</label><br>
            <input type="radio" name="diet" value="pesc" onclick="calculateTotal()">
            <label for="vehicle3"> Pescaterian</label>
            <input type="radio" name="diet" value="mixed" onclick="calculateTotal()">
            <label for="vehicle3"> Mixed</label>
            </div>
            <br><button class = "button" id="back3" type="button">Back</button>
            <button class = "button" id="next3" type="button">Next</button>
        </div>

        <div class="q4">
            <label>4 Are you on your period? What did you use today?</label><br>
            <div class="answers">
            <input type="radio" name="periodt" value="pad" onclick="calculateTotal()">
            <label for="vehicle1"> Period pad</label><br>
            <input type="radio"  name="periodt" value="tampon" onclick="calculateTotal()">
            <label for="vehicle2"> Tampon</label><br>
            <input type="radio" name="periodt" value="cup" onclick="calculateTotal()">
            <label for="vehicle3"> Period cup</label>
            <input type="radio" name="periodt" value="underwear" onclick="calculateTotal()">
            <label for="vehicle3"> Period Underwear</label>
            <input type="radio" name="periodt" value="na" onclick="calculateTotal()">
            <label for="vehicle3"> N/A</label>
            </div>
            <br><button class = "button" id="back4" type="button">Back</button>
            <button class = "button" id="next4" type="button">Next</button>
        </div>

        <div class="q5">
            <label>5 How much trash did you generate today?</label><br>
            <div class="answers">
            <input type="radio" name="trash" value="none" onclick="calculateTotal()">
            <label for="vehicle1"> None</label><br>
            <input type="radio"  name="trash" value="handful" onclick="calculateTotal()">
            <label for="vehicle2"> Handful</label><br>
            <input type="radio" name="trash" value="small" onclick="calculateTotal()">
            <label for="vehicle3"> Small bag full</label>
            <input type="radio" name="trash" value="large" onclick="calculateTotal()">
            <label for="vehicle3"> Large bag full</label>
            </div>
            <br><button class = "button" id="back5" type="button">Back</button>
            <button class = "button" id="next5" type="button">Next</button>
        </div>

        <div class="q6">
            <label>6 On a scale of 1-10, how concious were you of recyling today? <br> (1 being not concious at all and 10 being very concious)</label><br>
            <div class="answers">
            <input type="number" name="recycling" min="1" max="10" onchange="calculateTotal()"><br>
            </div>
            <br><button class = "button" id="back6" type="button">Back</button>
            <button class = "button" id="next6" type="button">Next</button>
        </div>

        <div class="q7">
            <label>7 On a scale of 1-10, how concious were you of electricity usage today? <br> (1 being not concious at all and 10 being very concious)</label><br>
            <div class="answers">
            <input type="number"  name="electricity" min="1" max="10" onchange="calculateTotal()"><br>
            </div>
            <br><button class = "button" id="back7" type="button">Back</button>
            <button class = "button" id="next7" type="button">Next</button>
        </div>

        <div class="q8">
            <label>8 Where did you get most of your food from today?</label><br>
            <div class="answers">
            <input type="radio" name="food" value="local" onclick="calculateTotal()">
            <label for="vehicle1"> Locally grown</label><br>
            <input type="radio"  name="food" value="supermarket" onclick="calculateTotal()">
            <label for="vehicle2"> Supermarket</label><br>
            <input type="radio" name="food" value="takeout" onclick="calculateTotal()">
            <label for="vehicle3"> Take-out/Eat-out</label>
            <input type="radio" name="food" value="sub" onclick="calculateTotal()">
            <label for="vehicle3"> Subscription meal kits</label>
            </div>
            <br><button class = "button" id="back8" type="button">Back</button>
            <button class = "button" id="next8" type="button">Next</button>
        </div>

        <input name="coin" type="number" id="hidden" value="">

        <div class="q9">
            <label>9 What other activities did you participate in today?</label><br>
            <div class="answers">
            <input type="checkbox" name="other" value="air" onclick="calculateTotal()">
            <label for="vehicle1"> Air travel</label><br>
            <input type="checkbox"  name="other" value="bottle" onclick="calculateTotal()">
            <label for="vehicle2"> Drinking bottled water</label><br>
            <input type="checkbox" name="other" value="shop" onclick="calculateTotal()">
            <label for="vehicle3"> Online shopping</label>
            <input type="checkbox" name="other" value="gum" onclick="calculateTotal()">
            <label for="vehicle1"> Chewing gum</label><br>
            <input type="checkbox"  name="other" value="plastic" onclick="calculateTotal()">
            <label for="vehicle2"> Single-use plastic wrap</label><br>
            <input type="checkbox" name="other" value="pest" onclick="calculateTotal()">
            <label for="vehicle3"> Used pesticides for your garden</label>
            <input type="checkbox" name="other" value="waste" onclick="calculateTotal()">
            <label for="vehicle3"> Wasted food becasue it expired/molded</label>
            </div>
            <br><button class = "button" id="back9" type="button">Back</button>
            <button class = "button" id="done" type="button" onclick="showmodal()">Done</button>
        </div>
    </form>

    <div class="modal" id="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Congratulations! You got </p><p id="coindisplay">yay</p><p> more coins!</p>
            <button class = "button" id="home"type="button" >Return Home</button>
        </div>
    </div>
    
    <script>
    //start quiz
    $(document).ready(function(){
        $("#home").click(function(){
            alert(document.getElementById("hidden").value);

                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST"){
                    //if(isset($_POST["coin"])){
                        $coin = $_POST['coin'];
                        echo "testing2";
                        mysqli_query($conn,"UPDATE user_info SET coins='$coin' WHERE id='$id'");
                        echo "testing3";
                    //}
                }
                ?>

            $("#quizform").submit();
            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST"){
                    //if(isset($_POST["coin"])){
                        $coin = $_POST['coin'];
                        echo "testing2";
                        mysqli_query($conn,"UPDATE user_info SET coins='$coin' WHERE id='$id'");
                        echo "testing3";
                    //}
                }
                ?>
        });

        //q1
        $("#next1").click(function(){
            $(".q1").fadeOut(350);
            $(".q2").delay(400).fadeIn(350);
        });

        //q2
        $("#next2").click(function(){
            $(".q2").fadeOut(350);
            $(".q3").delay(400).fadeIn(350);
        });
        $("#back2").click(function(){
            $(".q2").fadeOut(350);
            $(".q1").delay(400).fadeIn(350);
        });

        //q3
        $("#next3").click(function(){
            $(".q3").fadeOut(350);
            $(".q4").delay(400).fadeIn(350);
        });
        $("#back3").click(function(){
            $(".q3").fadeOut(350);
            $(".q2").delay(400).fadeIn(350);
        });

        //q4
        $("#next4").click(function(){
            $(".q4").fadeOut(350);
            $(".q5").delay(400).fadeIn(350);
        });
        $("#back4").click(function(){
            $(".q4").fadeOut(350);
            $(".q3").delay(400).fadeIn(350);
        });

        //q5
        $("#next5").click(function(){
            $(".q5").fadeOut(350);
            $(".q6").delay(400).fadeIn(350);
        });
        $("#back5").click(function(){
            $(".q5").fadeOut(350);
            $(".q4").delay(400).fadeIn(350);
        });

        //q6
        $("#next6").click(function(){
            $(".q6").fadeOut(350);
            $(".q7").delay(400).fadeIn(350);
        });
        $("#back6").click(function(){
            $(".q6").fadeOut(350);
            $(".q5").delay(400).fadeIn(350);
        });

        //q7
        $("#next7").click(function(){
            $(".q7").fadeOut(350);
            $(".q8").delay(400).fadeIn(350);
        });
        $("#back7").click(function(){
            $(".q7").fadeOut(350);
            $(".q6").delay(400).fadeIn(350);
        });

        //q8
        $("#next8").click(function(){
            $(".q8").fadeOut(350);
            $(".q9").delay(400).fadeIn(350);
        });
        $("#back8").click(function(){
            $(".q8").fadeOut(350);
            $(".q7").delay(400).fadeIn(350);
        });

        //q9
        $("#back9").click(function(){
            $(".q9").fadeOut(350);
            $(".q8").delay(400).fadeIn(350);
        });
    });

    </script>

    <script>

        var getTravel = new Array();
        getTravel["less10"] = 8;
        getTravel["less20"]=5;
        getTravel["more20"]=2;
        getTravel["none"]=10;

        var getDiet = new Array();
        getDiet["animal"] = 2;
        getDiet["plant"] = 10;
        getDiet["pesc"] = 8;
        getDiet["mixed"] = 5;

        var getPeriodt = new Array();
        getPeriodt["pad"] = 4;
        getPeriodt["tampon"] = 2;
        getPeriodt["cup"] = 10;
        getPeriodt["underwear"] = 9;
        getPeriodt["na"] = 5;

        var getTrash = new Array();
        getTrash["large"] = 2;
        getTrash["none"] = 10;
        getTrash["handful"] = 8;
        getTrash["small"] = 5;

        var getFood = new Array();
        getFood["takeout"] = 2;
        getFood["local"] = 10;
        getFood["supermarket"] = 8;
        getFood["sub"] = 3;

        var getTransport = new Array();
        getTransport["bike"] = 10;
        getTransport["car"] = 3;
        getTransport["public"] = 6;

        var getOther = new Array();
        getOther["air"] = 6;
        getOther["bottle"] = 3;
        getOther["shop"] = 2;
        getOther["gum"] = 1;
        getOther["plastic"] =2;
        getOther["pest"] = 4;
        getOther["waste"] = 2;

        //document.getElementById("cointracker").innerHTML = "coin";

        var totalCoin = 0;
        function calculateTotal(){
            //alert("screams super loud");
            totalCoin = 0;
            totalCoin += calculateTravel();
            totalCoin += calculateDiet();
            totalCoin += calculatePeriodt();
            totalCoin += calculateTrash();
            totalCoin += calculateFood();
            totalCoin += calculateTransport();
            totalCoin -= calculateOther();
            totalCoin += calculateElectricity();
            totalCoin += calculateRecycling();

            changeCoin();

            //alert("screams super loud");
            //totalCoin = calculateTravel() + calculateDiet() + calculatePeriodt() + calculateTrash() +calculateFood() + calculateTransport() + calculateOther() + calculateElectricity() + calculateRecyling();
            //document.getElementById("cointracker").innerHTML = totalCoin;
        }

        function changeCoin() {
            document.getElementById("hidden").value = totalCoin;
            document.getElementById("coindisplay").innerHTML = totalCoin;
        }

        function calculateTravel(){
            var travelCoin=0;
            var theform = document.forms["quizform"];
            var travel = theform.elements["travel"];
            for(var i =0; i<travel.length;i++){
                if (travel[i].checked){
                    travelCoin = getTravel[travel[i].value];
                    break;
                }
            }
            //document.getElementById("cointracker").innerHTML = travelCoin;
            return travelCoin;
        }

        function calculateDiet(){
            var dietCoin=0;
            var theform = document.forms["quizform"];
            var diet = theform.elements["diet"];
            for(var i =0; i<diet.length;i++){
                if (diet[i].checked){
                    dietCoin = getDiet[diet[i].value];
                    break;
                }
            }
            //alert(dietCoin);
            //document.getElementById("cointracker").innerHTML = dietCoin;
            return dietCoin;
        }

        function calculatePeriodt(){
            var periodtCoin=0;
            var theform = document.forms["quizform"];
            var periodt = theform.elements["periodt"];
            for(var i =0; i<periodt.length;i++){
                if (periodt[i].checked){
                    periodtCoin = getPeriodt[periodt[i].value];
                    break;
                }
            }
            //document.getElementById("cointracker").innerHTML = periodtCoin;
            return periodtCoin;
        }

        function calculateTrash(){
            var trashCoin=0;
            var theform = document.forms["quizform"];
            var trash = theform.elements["trash"];
            for(var i =0; i<trash.length;i++){
                if (trash[i].checked){
                    trashCoin = getTrash[trash[i].value];
                    break;
                }
            }
            //document.getElementById("cointracker").innerHTML = trashCoin;
            return trashCoin;
        }

        function calculateFood(){
            var foodCoin=0;
            var theform = document.forms["quizform"];
            var food = theform.elements["food"];
            for(var i =0; i<food.length;i++){
                if (food[i].checked){
                    foodCoin = getFood[food[i].value];
                    break;
                }
            }
            //document.getElementById("cointracker").innerHTML = foodCoin;
            return foodCoin;
        }

        function calculateTransport(){
            var transportCoin=0;
            var count = 0;
            var theform = document.forms["quizform"];
            var transport = theform.elements["transport"];
            for(var i =0; i<transport.length;i++){
                if (transport[i].checked){
                    transportCoin += getTransport[transport[i].value];
                    count++;
                }
            }
            if(count != 0){
                transportCoin = Math.trunc(transportCoin/count);
            } else{
                transportCoin = 0;
            }
            //document.getElementById("cointracker").innerHTML = transportCoin;
            return transportCoin;
        }

        function calculateOther(){
            var otherCoin=0;
            var theform = document.forms["quizform"];
            var other = theform.elements["other"];
            for(var i =0; i<other.length;i++){
                if (other[i].checked){
                    otherCoin += getOther[other[i].value];
                }
            }
            //document.getElementById("cointracker").innerHTML = foodCoin;
            return otherCoin;
        }

        function calculateElectricity(){
            var electricityCoin=0;
            var theform = document.forms["quizform"];
            var electricity = theform.elements["electricity"];
            electricityCoin = electricity.value;
            //document.getElementById("cointracker").innerHTML = electricityCoin;
            return Number(electricityCoin);
        }

        function calculateRecycling(){
            var recyclingCoin=0;
            var theform = document.forms["quizform"];
            var recycling = theform.elements["recycling"];
            recyclingCoin = recycling.value;
            //document.getElementById("cointracker").innerHTML = recyclingCoin;
            return Number(recyclingCoin);
        }


        //modal
        var modal= document.getElementById("modal");
        var btn = document.getElementById("modalBtn");
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function(){
            modal.style.display="none";
        }
        window.onclick=function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        function showmodal(){
            modal.style.display = "block";
        }
    </script>
</body>
</html>

