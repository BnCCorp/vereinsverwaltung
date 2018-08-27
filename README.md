# Vereinsverwaltung

Eine Webapp zum Verwalten eines Vereins.

Server und Client werden getrennt voneinander entwickelt.

Als Backend wird `laravel` benutzt. Damit wird eine `REST API` zur Verfügung gestellt, die der Client benutzen kann.

Als Frontend verwenden wir das Framework `VueJS`. Dies ermöglicht das clientseitige rerendering der einzelnen Seiten, wodurch das Neuladen von einzelnen Seiten überflüssig wird.

## Features

* Finanzverwaltung
    * Kategorien
    * Tags
    * Konten
    * Buchungen

* Mitgliederverwaltung
    * Stammdaten
    * Rollen (nicht jeder kann alles sehen, bzw ändern)
  
## Backend (Laravel)

* `OAuth2` Authentication mittels `Passport`
* `REST API`
* `roles` und `permissions`
  
## Client (VueJS)

* ähnlich wie `Angular` oder `React`, aber leighweight und Open Source
* `Vuex` als Statemanager (die durch API bezogenen Daten werden an einem Ort verwaltet -> Konsistenz in allen Views)
* `VueRouter` zum Verwalten der einzelnen Routes
* `Vuetify` als Material Framework -> **sehr einfach** Sidebar, Nav, Forms, Modals etc zu erstellen; direkt Material Design
* `Axios` zum aufrufen von APIs -> async