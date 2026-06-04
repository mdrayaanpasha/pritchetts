# Pritchett's Closets & Blinds
> *"We're sort of a big deal in the closet world."*

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat&logo=bootstrap&logoColor=white)
![Status](https://img.shields.io/badge/status-lovingly%20cursed-orange)

A full-stack e-commerce website for **Pritchett's Closets & Blinds** — the fictional closet company from *Modern Family*, run by Jay Pritchett. Built by a bored high schooler during the 2024 holidays who had no idea he was staring down two years of hard-earned lessons.

This is the **before**.

---

## What it does

- Browse closet types: walk-in, reach-in, wardrobes, and the infamous **Jay Special**
- Add to cart, place orders
- Register an account *(no password required — we trusted everyone)*
- View product images *(stored directly in the database as `LONGBLOB`, because why use a CDN)*

---

## The stack

| Layer | Choice | Hindsight |
|---|---|---|
| Backend | PHP | raw, procedural, glorious |
| Database | MySQL (MyISAM) | `latin1` charset, `int(11)`, the works |
| Frontend | Bootstrap + inline styles | hand-cramped div soup |
| Images | `LONGBLOB` in the DB | CDN? never heard of her |
| Auth | email only | passwords are overrated |
| Secrets | `config.php` (in the repo) | ✅ committed |
| Hosting | unknown | it worked on my machine |

---

## File structure

```
pritchetts/
├── index.html          # the landing page, holds up
├── config.php          # db credentials. in git. moving on.
├── register.php        # creates users, no password field
├── cart.php
├── orders.php
├── items.php
├── jayspecial.php      # Jay Pritchett's signature closet
├── walkin.php
├── reachin.php
├── wardrobe.php
├── post.php / sucess.php
├── closets.sql         # the schema, preserved for archaeology
└── *.jpg / *.png       # also stored in the db, just in case
```

---

## The schema (preserved for archaeology)

```sql
CREATE TABLE `jay-special` (   -- yes, hyphen. yes, backtick jail.
  `name`        text,
  `description` text,
  `price`       int(11) DEFAULT NULL,
  `image`       longblob    -- CDN? never heard of her.
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- utf8mb4 was right there the whole time
```

---

## Comments from future self

this clueless 2024 me... stored credentials in `config.php` in the repo. I had stored product images as `LONGBLOB` in MySQL like a man who had beef with disk storage. You wrote a registration system with no passwords. also used `MyISAM` in 2024. The table is named `jay-special` with a hyphen, which SQL had opinions about.

And yet **I flipping shipped**. I made a thing. A weird, cursed, unhinged thing.

The same instinct that made me build this is the same one that later made me:
- Use React with tailwindcss/shadcn.. or better claude with all these fancy words instead of Bootstrap div soup
- Put images on a CDN instead of a database column
- Keep credentials in `.env` files that go in `.gitignore`
- Write a backend in Express with typescript..!!
- Deploy to Vercel in 30 seconds


---

## Known issues

- [ ] `config.php` contains real database credentials and should not be in version control
- [ ] No password field in registration
- [ ] Images stored as LONGBLOB (performance disaster at scale)
- [ ] `MyISAM` engine (no transactions, no foreign keys)
- [ ] `latin1` charset (emoji and non-ASCII names will break)
- [ ] Table named `jay-special` (always needs backtick escaping)
- [ ] `sucess.php` is misspelled (classic)

---

## Running locally

```bash
# You'll need PHP + MySQL
php -S localhost:8000

# Import the schema
mysql -u root -p < closets.sql

# Edit config.php with your local db credentials
# (and then add it to .gitignore this time)
```

---

*Mitchell and Cameron would have loved a closet system this chaotic.*

**mdrayaanpasha** · 2024
