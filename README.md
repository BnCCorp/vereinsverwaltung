# Featurelist

## Finanzen

* Kategorien
  * Name
  * Typ

* *Barkonten*
  * Name
  * Typ
  * Anfangsbestand
  * Betrag

* *Girokonten*
  * Name
  * Typ
  * Anfangsbestand
  * Betrag
  * IBAN

* *Onlinekonten*
  * Name
  * Typ
  * Anfangsbestand
  * Betrag
  * eMail Adresse

* *Tag*
  * Name

* *Buchung*
  * Rechungsdatum
  * Bezahldatum
  * Erstellungsdatum
  * Konto
  * Zweck
  * Betrag
  * Kategorie
  * Belegnummer?
  * Beleg?
  * Person?

* *Features*
  * Kassenbericht erstellen
  * Spendenquittungen ausstellen

# Migrations
Beispielname: `2017_12_15_193214_create_members_table`  
Wird nun `php artisan migrate` ausgeführt, dann ist die im Anschluss überflüssig. Änderungen in dieser führen zu keinem
Erfolg. Migrations können nur einmal ausgeführt werden. Jede Änderung an der Datenbank erfordert eine eigene Migration,
so auch das Ändern und Löschen von Einträgen/Spalten. Dazu eine Migration erstellen mit
```
php artisan make:migration drop_x_column_from_y
```
Dazu wie in [https://laracasts.com/discuss/channels/general-discussion/cant-drop-column-with-dropcolumn](https://laracasts.com/discuss/channels/general-discussion/cant-drop-column-with-dropcolumn)
beschrieben in der Methode `up` die z.B. Löschung vornehmen und in der Methode `down` das Inverse dazu ausführen, also z.B.
das Erstellen der Spalte.

# Befehle

Falls ihr ne Tabelle löscht in phpMyAdmin: Auch den Eintrag in "migrations" löschen, damit ihr sie wieder mit 
```
php artisan migrate
```
erstellen könnt!

#### Server starten
```
php artisan serve
```

#### Model erstellen
Das Model generiert zusätzlich automatisch eine Migration File (make:migration Befehl ist hier nicht notwendig)
```
php artisan make:model User -m
```

#### create Migrations File (users durch Tabelle/Befehl ersetzen)
```
php artisan make:migration create_users_table
```

#### Alle migrations ausführen
```
php artisan migrate
```

#### Unique Validation für 2 Spalten
```
'unique:TABELLEN_NAME,SPALTE_1,NULL,id,SPALTE_2,' . request->WERT_VON_SPALTE_2
```

##### Beispiel:

Bei einer Finanzkategorie muss die Kombination aus `name` und `type` eindeutig sein
```
'unique:finance_categories,name,NULL,id,type,' . request->type
```

# Objekte nach SQL-Kriterien aus der DB ziehen
Will man Objekte aus der Datenbank bekommen, die bestimmte Kriterien erfüllen sollen (z. B. Alter > 20), so kann man
folgendes tun:
```
$var = DB::table('TABELLEN_NAME')->where("SPALTE", "LOGISCHE_OPERATION", "WERT")->get();
```
Nachzulesen unter [https://laravel.com/docs/5.6/queries#where-clauses](https://laravel.com/docs/5.6/queries#where-clauses)  
Die Abfragen können sehr umfangreich werden. Ausgaben sind Listen bei `get()`. `first()` liefert ein Element.

# Database Relationship
* Fremdschlüssel:
    * bei 1:n bekommt die Tabelle, welche jeweils nur einen anderen Wert speichern kann, die Fremdschlüssel.
    Diese werden in der Migration wie folgt gesetzt: [https://coderwall.com/p/o73fbq/creating-foreign-key-in-laravel-migrations](https://coderwall.com/p/o73fbq/creating-foreign-key-in-laravel-migrations)
    Die Änderungen im Model sind hier beschrieben: [https://www.easylaravelbook.com/blog/creating-a-hasmany-relation-in-laravel-5/](https://www.easylaravelbook.com/blog/creating-a-hasmany-relation-in-laravel-5/)
    
    * bei n:m diesem Tutorial folgen: [https://www.easylaravlbook.com/blog/introducing-laravel-many-to-many-relations/](https://www.easylaravelbook.com/blog/introducing-laravel-many-to-many-relations/)
    Many to many ist null trivial! Wie es geht folgt noch