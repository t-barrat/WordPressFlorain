# Thème WordPress - Le Florain

## Prérequis

1. [Node.js](https://nodejs.org/)
2. [Gulp](https://gulpjs.com/)

---

## Gulp syntaxe v3.x

- [Documentation Gulp](https://gulpjs.com/docs/en/getting-started/quick-start)

---

## Installation locale

Ouvrir le repertoire de travail dans une console/Terminal (*cmd* sous Windows).

```bash
cd /repertoire/de/travail/
npm install
```

---

## Commandes Gulp disponibles

```bash
gulp watch
```
- Compilation du SCSS vers CSS, minification et minification Javascript à la volée + création des fichiers .map

```bash
gulp sass
```
- Compilation du SCSS vers CSS (one shot)

```bash
gulp minifycss
```
- Minification des fichiers CSS (one shot)

```bash
gulp styles
```
- Compilation du SCSS vers CSS + minification  (one shot)

```bash
gulp scripts
```
- Minification des fichiers Javascript (one shot)

```bash
gulp imagemin
```
- Optimisation des images du thème (one shot)

```bash
gulp build
```
- Rebuild complet des CSS, JS et optmisation des images (one shot)

---

## Liste des zones de widget

1. Sidebar Défaut

---

## Liste des zones de menu

- Header menu (main_menu)

---

## Liste des gabarits (racine du thème)

[Voir la Template Hierarchy de WordPress](https://developer.wordpress.org/themes/basics/template-hierarchy/)

- footer.php : footer du site
- header.php : header du site
- front-page.php : gabarit de la page d'accueil
- index.php : gabarit par défaut
- search.php : gabarit des résultats de recherche
- sidebar.php : sidebar du site

---
