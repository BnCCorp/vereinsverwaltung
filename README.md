Featurelist
===========

Finanzen
--------

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
  * Zweck
  * Betrag
  * Kategorie
  * Belegnummer?
  * Beleg?
  * Person?

* *Features*
  * Kassenbericht erstellen
  * Spendenquittungen ausstellen


Befehle
=======

Falls ihr ne Tabelle löscht in phpMyAdmin: Auch den Eintrag in "migrations" löschen, damit ihr sie wieder mit 
```
php artisan migrate
```
erstellen könnt!

Server starten:
```
php artisan serve
```

Model erstellen inkl. migration (mehr Erklärung einfügen, zb was ist ne Migration) (User durch Tabelle ersetzen)
```
php artisan make:model User -m
```

create tables in Database (User durch Tabelle ersetzen)
```
php artisan make:migration create_users_table --create=users
```

To run all of your outstanding migrations, execute the migrate Artisan command:
```
php artisan migrate
```