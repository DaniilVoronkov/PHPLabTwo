    <?php include('header.php'); ?>
    <div class="container">
        <div class="wrapper">
        <h1> Here's Your Valentine's Poem </h1> 
        <?php
        //make the variables global
        $submit = filter_input(INPUT_POST, 'submit'); 
        $colour = filter_input(INPUT_POST, 'colour');
        $noun = filter_input(INPUT_POST, 'noun');
        $person = filter_input(INPUT_POST, 'person');

        function poemDisplay() {
            //using the global variables in function
            global $colour, $noun, $person;
            echo "<div class='poemDiv'>";
            echo "<p> Roses are $colour.</p>";
            echo "<p> $noun are blue. </p>";
            echo "<p> Dear $person, Happy Valentine's Day to you! </p>";
            echo "</div>"; 
        }
        // 5. logic error - no ! 
        if(isset($submit)) {
            //checking if the user filled all the fields. If no - print the message
            if (empty($colour) || empty($person) || empty($noun))
            {
                echo "<p> One or more field is empty. Please, fill it up and try again! </p>";
            }
            //checking if the plural noun ends with s. 
            else if(!(preg_match("/s$/", $noun)))
            {
                echo "<p> Noun word must be plural! </p>";
            }
            //Checking the input. If the user used numbers - print the error message
            else if(!(preg_match('/^[a-zA-Z]+$/', $noun)) || !(preg_match('/^[a-zA-Z]+$/', $colour)) || !(preg_match('/^[a-zA-Z]+$/', $person)))
            {
                echo "<p> You can't have numbers or letters from another language in your words! </p>";
            }
            //name of the person should start with capital letter
            else if(!(preg_match('/^[A-Z]/', $person)))
            {
                echo "<p> Start the person name with the capital letter, show the person you generating valentine some respect!!! </p>";
            }
            //if none of the conditions above were true - print the poem
            else {
                poemDisplay();      
            }   
        }
        ?>
         <a href="index.php" class="btn btn-secondary"> Create Another Poem </a> 
         </div>
        </div>
    </body>
</html>