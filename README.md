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

Server starten:
```
php artisan serve
```

Model erstellen inkl. migration (mehr Erklärung einfügen, zb was ist ne Migration)
```
php artisan make:model User -m
```

create tables in Database
```
php artisan migrate
```