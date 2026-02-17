[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/eN_TA-qd)
# Examen Laravel (MVC, Dades, Seguretat) · 3h

Aplica el que has vist als temes 03, 04 i 05 per construir un petit gestor de **projectes de programari** en Laravel **sense API, només web (Blade + controllers)**.

## Documentacio offline

Pots accedir als apunts i a la documentacio de Laravel directament des del repositori amb enllacos relatius:

- Apunts:
  - [`documentacio/apunts/03MVC_Laravel.md`](documentacio/apunts/03MVC_Laravel.md)
  - [`documentacio/apunts/04dades_Laravel.md`](documentacio/apunts/04dades_Laravel.md)
  - [`documentacio/apunts/05seguretat_Laravel.md`](documentacio/apunts/05seguretat_Laravel.md)
- Laravel: [`documentacio/laravel/README.md`](documentacio/laravel/README.md) (i la resta de fitxers dins de `documentacio/laravel/`)

Si els obris des d'un editor o visor Markdown local, funcionen offline sense necessitat d'Internet.


## Com començar (Sail + Docker)

1. Executa:

```bash
  chmod 777 storage -R
   docker run --rm -v $(pwd):/app -w /app laravelsail/php84-composer:latest composer install
   docker run --rm -v $(pwd):/app -w /app node:20 npm install
   docker run --rm -v $(pwd):/app -w /app node:20 npm run build
   ./vendor/bin/sail up -d
  
```
2. Executa

```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
```

3. Comprova: `http://localhost`. 
4. Implementa els casos d’ús demanats.

## Dades inicials

Ja tens migracions i models per a:

- `teams` (equips) (`name`, `country`, `bio`)
- `technologies` (tecnologies) (`name`)
- `projects` (projectes) (`title`, `publication_year`, `price`, `stock`, `description`, `is_visible`, `team_id`) amb pivot `project_technology`
- `users` amb camp `role` (`admin`/`user`)
- Seeder crea:
  - Usuari `admin@example.test` / password `secret` (rol `admin`)
  - Usuario `user@example.test` / password `secret` (rol `user`)
  - 6 equips, 8 tecnologies, molts projectes relacionats
 
## Objectiu i requisits funcionals

- Llistar projectes amb paginació.
- Detall d’un projecte amb equip, tecnologies i stock (p. ex. llicencies o disponibilitat).
- CRUD de projectes només per usuari autenticat (crear, editar, eliminar(administrador)).  Alta/edició han de permetre seleccionar equip i múltiples tecnologies.
- Afegir nova entitat: crea model, migració i seeder per a `partners` amb camps `name` (string) i `country` (string nullable). Afegeix relació `projects.partner_id` (foreign key nullable) i mostra el partner al llistat/detall del projecte. Sembra almenys 2 partners i associa-les als projectes de prova.

## Requisits tècnics

- **MVC bàsic**: rutes, controllers i models.
- **Dades**: usa Eloquent per llegir/guardar i aprofita les migracions/seeders existents.
- **Seguretat mínima**: validació de formularis, autoritzacions. 
- **Presentació**: vistes Blade clares amb layout comú i missatges d’èxit/errada.
  

## Checklist puntuada (10 punts)

Part del projecte base ja esta resolt; completa o ajusta el que falte.

- [ ] **1.0 punt**: Enllacos de navegacio (welcome -> login) i dashboard que redirigisca a `projects.index`.
  - [ ] Afegir enllac al login en la vista welcome.
  - [ ] Redirigir la ruta dashboard a `projects.index`.
- [ ] **2.0 punts**: Llistat de projectes amb paginacio i enllacos al detall.
  - [ ] Ruta index i controlador per obtenir projectes amb paginacio.
  - [ ] Vista `projects/index` amb taula o llistat i enllacos al detall.
  - [ ] Afegir enllac a crear projecte (si hi ha permis) i missatge si no hi ha dades.
  - [ ] Paginació dels resultats.
- [ ] **1.0 punt**: Detall de projecte amb equip, tecnologies, stock i partner.
  - [ ] Ruta show i controlador amb relacions carregades.
  - [ ] Vista `projects/show` mostrant camps i relacions.
- [ ] **3.0 punts**: CRUD de projectes amb formularis (create/edit), validacio, `old()` i missatges flash.
  - [ ] Formularis create/edit amb camps i seleccions (equip, tecnologies, partner).
  - [ ] Validacio en store/update i retorn amb `old()` i errors.
  - [ ] Accions store/update/delete amb missatges flash.
  - [ ] Vincular tecnologies (many-to-many) en crear/editar.
  - [ ] Protegir rutes de creacio/edicio amb middleware d'autenticacio.
- [ ] **1.5 punts**: Autenticacio i autoritzacio (login/logout i policy/gate per rol admin).
  - [ ] Controlar enllacos de navegacio.
  - [ ] Policy o gate per crear/editar/eliminar segons rol.
  - [ ] Amagar botons d'accions segons permisos (crear, editar, eliminar).
  - [ ] Gestionar l'intent d'acces no autoritzat amb missatge o redireccio.
- [ ] **1.5 punt**: Nova entitat `publishers` (migracio, model, seeder, relacio i visualitzacio).
  - [ ] Crear migracio i model `Publisher`.
  - [ ] Afegir seeder i dades de prova.
  - [ ] Relacio amb `projects` i mostrar-la en llistat/detall.
