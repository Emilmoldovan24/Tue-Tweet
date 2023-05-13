<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blabla</title>
</head>
<body>
<div>
        <?php
           use Illuminate\Support\Facades\DB;

           //Erstellt momentanen UNIX Zeitpunkt als Timestamp!
           $currentTimeString = time();
           $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);

          //Erstellt neuen Eintrag in der Datenbank users, hier ist darauf zu achten dass immer alle Spalten gefüllt sein müssen! 
          //Das mit den Fragezeichen ist gegen SQL Injection und hat für euch keine Relevanz , wenn ihr jetzt beispielsweise einen neuen Eintrag durch die SIghn in 
          //Funktion erstellen wollt dann könnt ihr die vom user eingegeben Daten an eine Variable binden und diese in dem Insert STatement aufrufen!
          // hier also statt 'peter' zb $username
          //Die für euch ungenutzten spalten (Felder) wie profile_bio oder profile_img kann man einfach mit NULL füllen , diese werden dann später durch
          //ein upgrade statement verändert. 

          //nächste 2 Zeilen auskommentieren (ein insert funktioniert hier nur einmal da die email unique ist)
          # DB::insert('insert into users(username, email, user_password, profile_bio, profile_img, created_at) 
          # values(?,?,?,?,?,?)', ['peter', 'peter@aol.de', 1111, 'ich zeig euch wies geht :-)', NULL ,$currentTimestamp]);

          DB::insert('insert into tweets(user_id, tweet, img, created_at) 
          values(?,?,?,?)',[2, 'Hallo das ist ein Tweet', NULL ,$currentTimestamp]);


          // Mit folgender Art kann man die Userid des erstellten eintrags an eine variable binden
          // $id = DB::table('users')->insertGetId([
          //   'username' => 'schweinchen',
          //   'email' => 'athomas198.com',
          //   'user_password' => 345678888,
          //   'profile_bio' => NULL,
          //   'profile_img' => NULL,
          //   'created_at' => $currentTimestamp
          //   ]);

          //   echo $id.'<br';

          // Wenn man eine Abfrage aus der Datenbank machen möchte kommt der select operator zum einsatz. 
          // diese sind immer gleich aufgebaut :
          //SELECT -> Welche Spalte/n wolllt ihr genau herauslesen  (* bedeutet alles)
          //FROM   -> von welcher relation wollt ihr lesen
          //WHERE  -> welche Bedingungen soll diese haben

          //den EIntrag/Einträge das ihr haben wollt wird als Array oder Container (mehrere rows) ausgegeben 

           $userName = DB::select('select u.username from users AS u where user_id = ?', [5]);
  
           foreach ($userName as $user) {
           echo $user->username.'<br>';
           }
           $users = DB::select('select * from tweets ');
           //führt für jede row die gewünschten aktionen aus (die namenskonversation in der Schleife bleibt euch überlassen)
           foreach ($users as $user) {
               echo $user->tweet.'<br>';
               echo $user->user_id.'<br>';
               echo $user->created_at.'<br>';


           }

           // oder 
           $userPeter = 'peter';
           #$result = DB::table('users')->select('user_id')->where('username', $userPeter)->first();
          // Löschen eines Datensatzes geht wie folgt : 

          DB::delete('delete from tweets where tweet LIKE "Hallo%"');

          //Update eines eintrages einer Tabelle geht wie folgt : 

          DB::update('update users set user_password = 54321 where user_id = ?',[4]);

        //Wenn man überprüfen will ob ein Eintrag in einer Tabelle bereits vorhanden ist geht das mit 
          $testName = 'peter';
          $isIn = (0 < (DB::scalar('select count(case when u.username = "pe4er" then 1 end)from users AS u')));
          echo $isIn;
        ?>
    </div>
</body>
</html>

