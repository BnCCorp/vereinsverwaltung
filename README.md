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
  * Zweck
  * Betrag
  * Kategorie
  * Belegnummer?
  * Beleg?
  * Person?

* *Features*
  * Kassenbericht erstellen
  * Spendenquittungen ausstellen


# Befehle

Falls ihr ne Tabelle löscht in phpMyAdmin: Auch den Eintrag in "migrations" löschen, damit ihr sie wieder mit 
```
php artisan migrate
```
erstellen könnt!

### Server starten
```
php artisan serve
```

### Model erstellen
```
php artisan make:model User -m
```

### create Migrations File (User durch Tabelle ersetzen)
```
php artisan make:migration create_users_table --create=users
```

### Alle migrations ausführen
```
php artisan migrate
```

### Unique Validation für 2 Spalten
```
'unique:TABELLEN_NAME,SPALTE_1,NULL,id,SPALTE_2,' . request->WERT_VON_SPALTE_2
```

#### Beispiel:

Bei einer Finanzkategorie muss die Kombination aus `name` und `type` eindeutig sein
```
'unique:finance_categories,name,NULL,id,type,' . request->type
```