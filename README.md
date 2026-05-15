# Azorean Art rebuild in laravel / webshop 

## Publieke kant

* product page
* simpele order form / buy now
* checkout redirect
* success / cancel page

## Admin kant (Filament)

* product beheren
* variants beheren
* shipping rules beheren
* orders bekijken
* orderstatus aanpassen
* betalingstatus zien

---


## 1. Product

fields:

* title
* slug
* description
* is_active
* cover_image
* base_currency

---

## 2. ProductVariant

fields:

* product_id
* sku
* title
* language (`en`, `pt`)
* format (`softcover`)
* weight_grams
* price_cents
* is_active

example:

* Comic – English – Softcover
* Comic – Português – Softcover

---

## 3. ShippingZone
not too generic, clean

fields:

* name
  example:

  * Azores local
  * Azores to mainland
  * France shipment
* code
* is_active

---

## 4. ShippingRate

fields:

* variant_id nullable
* shipping_zone_id
* weight_from
* weight_to
* amount_cents
* notes

---

## 5. Order

fields:

* order_number
* status (`pending`, `paid`, `cancelled`, `fulfilled`)
* payment_status (`pending`, `paid`, `failed`, `refunded`)
* payment_method (`stripe` / `mollie`)
* payment_reference
* customer_name
* customer_email
* customer_phone nullable
* shipping_name
* shipping_address_line_1
* shipping_address_line_2 nullable
* shipping_postal_code
* shipping_city (merge with state)
* shipping_country
* shipping_zone_id
* subtotal_cents
* shipping_cents
* total_cents
* currency
* notes nullable

---

## 6. OrderItem

fields:

* order_id
* product_variant_id
* title_snapshot
* unit_price_cents
* quantity
* total_cents

---

# simple relations

## Product

* hasMany ProductVariant

## ProductVariant

* belongsTo Product
* hasMany OrderItem

## ShippingZone

* hasMany ShippingRate
* hasMany Order

## Order

* hasMany OrderItem
* belongsTo ShippingZone

---

# Checkout flow: MVP 

## Stap 1

User opent strip-pagina

## Stap 2

User kiest:

* taal/variant
* aantal
* verzendregio of land

## Stap 3

App bepaalt:

* productprijs
* shipping rate
* totaal

## Stap 4

User vult gegevens in:

* naam
* e-mail
* adres
* postcode
* stad
* land

## Stap 5

app produces

* Order met status `pending`
* OrderItem
* checkout session bij Stripe of Mollie

## Stap 6

Na succesvolle betaling:

* `payment_status = paid`
* `status = paid` of `fulfilled_ready`
* bevestigingsmail sturen

---

# Shipping: hoe aanpakken

Niet te vroeg moeilijk maken.

## Eerste versie

Werk met een beperkte set verzendopties:

* Azores local
* Azores → Mainland Portugal
* France / EU

de klant kiest bij checkout een regio die jij intern mapt.

### expliciete verzendzones

Dropdown:

* Azores
* Mainland Portugal
* France / EU


# Filament structuur

## 1. ProductResource

* title
* slug
* description
* active
* cover image

### Relation manager:

* Variants

---

## 2. ProductVariantResource

Of als relation manager onder Product.

fields:

* title
* language
* format
* sku
* price_cents
* active

---

## 3. ShippingZoneResource

fields:

* name
* code
* active

---

## 4. ShippingRateResource

fields:

* zone
* optional variant
* amount
* notes

---

## 5. OrderResource

Belangrijkste admin scherm.

### Table:

* order number
* customer name
* email
* total
* status
* payment status
* created_at

### Filters:

* pending
* paid
* cancelled
* fulfilled

### Detail:

* adres
* items
* shipping zone
* notes
* payment ref

### Actions:

* mark fulfilled
* mark cancelled
* resend confirmation mail (later)

---

# Wat in code waar hoort

## Models

* puur data + relaties + kleine helpers

## Services

### OrderService

Verantwoordelijk voor:

* order aanmaken
* subtotal / shipping / total berekenen
* items toevoegen

### CheckoutService

Verantwoordelijk voor:

* payment provider call
* checkout session maken
* callback/webhook afhandelen

Dat houdt je controllers schoon.

---

# Routes / pagina’s

## Publiek

* `/shop`
* `/shop/{product:slug}`
* `POST /checkout`
* `/checkout/success`
* `/checkout/cancel`

---

# Fases voor Azorean shop

## Fase 1 — Domain + Filament

* migrations
* models
* filament resources
* product + variants + shipping rates beheerbaar maken

## Fase 2 — Public buy flow

* shop page
* checkout form
* order create

## Fase 3 — Payments

* Mollie/Stripe checkout
* success/cancel
* payment status update

## Fase 4 — Admin polish

* order detail
* status changes
* mail

---

# TODONTS for MVP

* coupons
* user accounts
* stock system
* cart
* invoices pdf
* tax complexity tenzij nodig
* “from location” dynamisch modelleren
* multilingual admin complexity


# map / code structuur

```php
app/
  Models/
    Product.php
    ProductVariant.php
    ShippingZone.php
    ShippingRate.php
    Order.php
    OrderItem.php

  Services/
    OrderService.php
    CheckoutService.php

  Http/
    Controllers/
      ShopController.php
      CheckoutController.php
      PaymentWebhookController.php
```

