$rand_keys = array_rand($massFullNames);
    $a = ['gender'];
    $rand_gender = array_combine($a, array_splice(explode(' ', $massFullNames[$rand_keys]), -2, -1));
    $rand_shortNames = array_splice(explode(' ', $massFullNames[$rand_keys]), 0, 2);
    $rand_male = $rand_shortNames[1].' '.mb_substr($rand_shortNames[0], 0, 1).'.';
    $rand_female = $rand_shortNames[1].' '.mb_substr($rand_shortNames[0], 0, 1).'.';
    if ($rand_gender['gender'] == 'мужской') 
        return $rand_male;
     else 
        return $rand_keys;
    
    if ($rand_gender['gender'] == 'женский') 
        return $rand_female;
     else 
        return $rand_keys;