<?php
    include 'persons.php';

    echo '<h3>Разбиение и объединение ФИО</h3>';

    function getPartsFromFullname($fromFullname) {
        $namesKey = ['surname', 'name', 'patronomic'];
        return array_combine($namesKey, explode(' ',$fromFullname));
    }

    function getFullnameFromParts($surname, $name, $patronomic) {
        return $surname." ".$name." ".$patronomic;
    }

    echo '<p>';
    foreach ($example_persons_array as $value) {
        print_r(getPartsFromFullname($value['fullname']));
    }
    
    echo '<br><br>';

    foreach ($example_persons_array as $value) {
        $fullNames = getPartsFromFullname($value['fullname']);
        $partSurname = $fullNames['surname'];
        $partName = $fullNames['name'];
        $partPatronomic = $fullNames['patronomic'];
        echo getFullnameFromParts($partSurname, $partName, $partPatronomic).'<br>';
    }
    echo '</p>';

    echo '<h3>Сокращение ФИО</h3>';

    function getShortName($shortNames) {
        $fullNames = getPartsFromFullname($shortNames);
        return $fullNames['name'] . " " . mb_substr($fullNames['surname'], 0, 1) . ".";
    }

    echo '<p>';
    foreach ($example_persons_array as $value) {
        echo getShortName($value['fullname']).'<br>';
    }
    echo '</p>';

    echo '<h3>Определения пола по ФИО</h3>';

    function getGenderFromName($fullNames) {
        $massFullName = getPartsFromFullname($fullNames);
        $femaleSurname = mb_substr($massFullName['surname'], -2, 2);
        $femaleName = mb_substr($massFullName['name'], -1, 1);
        $femalePatr = mb_substr($massFullName['patronomic'], -3, 3);
        $maleSurname = mb_substr($massFullName['surname'], -1, 1);
        $maleName = mb_substr($massFullName['name'], -1, 1);
        $malePatr = mb_substr($massFullName['patronomic'], -2, 2);
        $gender = 0;
        
        if ($maleSurname == 'в' || ($maleName == 'й'|| $maleName == 'н') || $malePatr == 'ич')
            $gender += 1;
        else if ($femaleSurname == 'ва' || $femaleName == 'а' || $femalePatr == 'вна')
            $gender -= 1;
        else $gender == 0;

        switch ($gender <=> 0) {
            case 1:
                return $massFullName['surname'].' '.$massFullName['name'].' '.$massFullName['patronomic'].' - мужской пол';
                break;
            case -1:
                return $massFullName['surname'].' '.$massFullName['name'].' '.$massFullName['patronomic'].' - женский пол';
                break;
            case 0:
                return $massFullName['surname'].' '.$massFullName['name'].' '.$massFullName['patronomic'].' - неопределенный пол';
                break;
        }
    }

    echo '<p>';
    foreach ($example_persons_array as $value) {
        echo getGenderFromName($value['fullname']).'<br>';
    }
    echo '</p>';

    echo '<h3>Определение возрастно-полового состава</h3>';

    function getGenderDescription($fullNames) {
        $a = ['gender'];
        $i = 0;
        $gender = array_combine($a, array_splice(explode(' ', getGenderFromName($fullNames)), -2, -1));
        if ($gender['gender'] == 'мужской')
            $i += 1;
        else if ($gender['gender'] == 'женский')
            $i -= 1;
        else $i == 0;

        switch ($i <=> 0) {
            case 1:
                return 1;
                break;
            case -1:
                return -1;
                break;
            case 0:
                return 0;
                break;
        }
    }
        
    foreach ($example_persons_array as $value) {
        $gender[] = getGenderDescription($value['fullname']);
    }
    function und ($gender) {
        return $gender == 0;
    }
    function female ($gender) {
        return $gender == -1;
    }
    function male ($gender) {
        return $gender == 1;
    }
    $female = count(array_filter($gender, 'female'));
    $male = count(array_filter($gender, 'male'));
    $und = count(array_filter($gender, 'und'));
    $sum = count($gender);
    $femalePer = round($female * 100 / $sum, 1);
    $malePer = round($male * 100 / $sum, 1);
    $undPer = round($und * 100 / $sum, 1);
    
    echo '<p>';
    echo 'Мужчины - '.$malePer.'%<br>Женщины - '.$femalePer.'%<br>Не удалось определить - '.$undPer.'%';
    echo '</p>';

    function getPerfectPartner($persons) {
        
    }

    foreach ($example_persons_array as $value) {
        
    }

    

    echo '<p>';
    echo '</p>';
?>