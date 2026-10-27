SPIN THE WHEEL GENERATOR — LAB 5
================================

FILES
All HTML, PHP and CSS files needed for Tasks 1–13 are included in this folder.

SETUP (Windows + XAMPP)
1. Install/open XAMPP Control Panel.
2. Start Apache and MySQL. Both should show green.
3. Copy the entire wheel_generator_lab folder to:
   C:\xampp\htdocs\wheel
   (Rename the folder to wheel if needed.)
4. Open http://localhost/wheel/index.html

DATABASE SETUP (do this in order)
1. Open http://localhost/wheel/create_db.php once.
2. Open http://localhost/wheel/create_tables.php once.
3. Open http://localhost/wheel/insert_samples.php once.
4. Check http://localhost/wheel/saved.php

IMPORTANT
- Run insert_samples.php only once unless you intentionally want duplicate sample rows.
- update_wheel.php changes wheel ID 1 to Dinner Picker and candy theme.
- delete_wheel.php deletes the selected wheel and its spin history. Use it only for wheels you want to remove.
- This follows the lab's local XAMPP setup (MySQL user root with a blank password).
- If you already created the database/tables, do not rerun the create scripts unnecessarily; they may report that the database/table already exists.

TASK TESTING
Task 1: index.html
Task 2: create.html
Task 3: title.php
Task 4: test_lib.php
Tasks 5–7: submit the form at create.html and test spin/history/cookie.
Tasks 8–10: run database setup scripts in order.
Task 11: saved.php
Task 12: click Spin in saved.php
Task 13: update_wheel.php, then test Delete on a wheel you no longer need.
