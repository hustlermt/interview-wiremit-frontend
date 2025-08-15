
# **Wiremit - Send Money Web App (Laravel + Sneat Admin)**

Wiremit "Send Pocket Money" 
It’s built in Laravel using the Sneat Admin template. The app lets Zimbabwean parents send money to their children studying in the UK (GBP) or South Africa (ZAR).

---

## **📂 Project Setup**

### 1. **Clone the repo**

```bash
git clone https://github.com/hustlermt/interview-wiremit-frontend.git
cd interview-wiremit-frontend
```

### 2. **Install dependencies**

```bash
composer install

```

### 3. **Setup environment file**

* I have included `.env.example` with the same structure as my local `.env`.
* Copy it to `.env`:

```bash
cp .env.example .env
```

* Update your DB credentials, mail settings, and other app configs in `.env`.

### 4. **Generate app key**

```bash
php artisan key:generate
```

### 5. **Run migrations**

```bash
php artisan migrate
```

### 6. **Serve the app**

```bash
php artisan serve
```

Now visit:

```
http://127.0.0.1:8000
```

###  **DATABASE**

Used the db.sqlite database, install an extention like SQLite Viewer to browse through and to also check you uploads.*
---
**Database Structure**
---
Tables Overview

*users*
Stores all user accounts (both admins and normal users).
Key fields:

id

name

email

password

account_type (admin or user)

created_at, updated_at

*adverts*
Stores uploaded adverts for the dashboard carousel.
Key fields:

id

title

url (optional)

advert_image

created_at, updated_at

*transactions*
Records all money send transactions.
Key fields:

id

user_id (FK to users table)

recipient_country

amount_usd

fee_amount

exchange_rate

final_amount

created_at, updated_at


## **🌍 Handling the FX Rates Endpoint**

Used the provided API endpoint:

```
https://68976304250b078c2041c7fc.mockapi.io/api/wiremit/InterviewAPIS
```

* This returns currency data in an array of objects.
* We flatten it into a simple key-value array, e.g.:

```json
{
  "USD": 1,
  "GBP": 0.74,
  "ZAR": 17.75
}
```

* Only **GBP** and **ZAR** are used in the app.
* The rates are fetched live from the API each time they are needed.

### **Offline Handling**

If the app is accessed with no internet connection:

* On page reload, an alert pops up saying:

  ```
  No internet connection. We can’t access currency rates.
  ```
* This was a **deliberate choice** — I didn’t want to add a deafult option because the business logic depends on accurate, live exchange values.

---

## **💸 Send Money Section**

### **Validation Rules**

* **Recipient Country**: Only UK (GBP) or South Africa (ZAR).
* **Amount in USD**: Must be within allowed min & max.
* **Fee Calculation**:

  * 10% for GBP
  * 20% for ZAR
* **Final Amount** = USD amount minus fee, converted using the live rate from the endpoint.
* All calculations are rounded **up** to avoid underpaying the recipient.

If a user tries to send without meeting these conditions, they get a validation error right on the form.

---

## **📢 Adverts Section**

* Admins can upload adverts (image + title + optional URL).
* Images are stored in `/assets/img/adverts`.
* Adverts are displayed in a carousel on the General User Dashboard.
* Admin can **edit** or **delete** adverts directly from the adverts table.

---

## **📜 Transactions Section**

* Shows a paginated list of past transactions (at least 15).
* Records amount sent, country, exchange rate used, and fee.
* Designed so more countries can be added later without breaking logic.
* Min amount is 5 and Max 500 and can be adjusted.

---

## **🔐 Access Control**

* All admins and general users log in through the same login page and will be redirected to `/dashboard` route.
* The **layout stays the same** for everyone.
* What changes is **the content inside the pages which is shown based on account type**:

  * Admin sees adverts management, all users transactions, and full controls.
  * General users only see their own transactions, the send money form and adverts posted by Admin.
* This is handled by checking the logged-in user’s `account_type` in the controller and Blade views.

---

## **📱 UI & UX Notes**

* Built with Sneat Admin, so it’s responsive on mobile and desktop.
* Form fields have clear validation messages.
* Bootstrap alerts used for success/error feedback.
* Accessible with keyboard navigation and good contrast for text.

---

## **🛡 Security**

* All inputs validated before saving to DB.
* CSRF tokens on all forms.
* File uploads restricted to specific image types.
* No sensitive data stored in front-end JavaScript.

