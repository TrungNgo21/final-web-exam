<?php
function get_edu_data(){
    $fp = fopen("./cv.csv","r");
    $edu = [];
    $index = 1;
    $i = 0;
    while($row = fgetcsv($fp)){
        if($index % 2 != 0){
            $edu[$i] = ["degree" => $row[1], "school" => $row[2], "starting-year" => $row[3], "ending-year" => $row[4]];
        }
        $index ++;
        $i++;
    }
    return $edu;
}

function get_exp_data(){
    $fp = fopen("./cv.csv", "r");
    $exp = [];
    $index = 0;
    $i = 0;
    while($row = fgetcsv($fp)){
        if($index % 2 == 0){
            $exp[$i] = ["work" => $row[1], "place" => $row[2], "starting-year" => $row[3], "ending-year" => $row[4]];
        }
        $index ++;
        $i++;
    }
    return $exp;
}

function sort_exp($job1, $job2){
    return $job2["starting-year"] - $job1["starting-year"];
};

function sort_edu($edu1, $edu2){
    return $edu2["starting-year"] - $edu1["starting-year"];
};


$edu = get_edu_data();
$exp = get_exp_data();

uasort($edu,"sort_edu");
uasort($exp,"sort_exp");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>CV</title>
</head>
<body>
      <main>
          <div class="info-container">
              <div class="info-container__img">
                  <img src="./CV-img.jpeg" alt="CV image">
              </div>
              <div class="info-container__about">
                  <h1 class="info-container__about__name">Ngo Lam Bao Trung</h1>
                  <h2 class="info-container__about__tel">0834986599</h2>
                  <h3 class="info-container__about__email">ngolambaotrung@gmail.com</h3>
              </div>
          </div>
        <section class="exp-container">
            <h1>Experience</h1>
            <?php foreach($exp as $key => $data){ ?>
            <div class="exp-container__info">
                <div>
                    <h2 class="job-tilte"><?=$data["work"]?></h2>
                    <p><?=$data["place"]?> <span><?=$data["starting-year"]?>-<?=$data["ending-year"]?></span></p>
                </div>
            </div>
            <?php };?>
        </section>
        <section class="edu-container">
            <h1>Education</h1>
            <?php foreach($edu as $key => $data){ ?>
            <div class="exp-container__info">
                <div>
                    <h2 class="job-tilte"><?=$data["degree"]?></h2>
                    <p><?=$data["school"]?> <span><?=$data["starting-year"]?>-<?=$data["ending-year"]?></span></p>
                </div>
            </div>
            <?php };?>
        </section>

        <div class="controller">
            <label for="hide-email">Click this to hide email</label>
            <input type="checkbox" name="" id="hide-email">
            <label for="hide-phone">Click this to hide email</label>
            <input type="checkbox" name="" id="hide-phone">

        </div>
      </main>
  </body>
  <script src="./script.js"></script>
</html>