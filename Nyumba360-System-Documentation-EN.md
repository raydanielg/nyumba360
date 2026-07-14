# 🏠 Nyumba360

**"Find, Rent and Manage Houses with Ease"**

System Concept & Business Documentation — Version 2.0 (Pay-Per-Unlock Model)

---

## 1. Executive Summary

Nyumba360 is a **Rental Marketplace + Property Management platform** built for the Tanzanian market. Anyone can browse houses **for free** — photos, videos, price, number of rooms, general area. But the moment a house-seeker wants to act — to see the **exact location** and the **phone number** of the landlord or broker — they pay a small unlock fee of **TZS 1,000 per house**.

This flips the traditional model. Instead of charging landlords heavily to advertise (which keeps supply off the platform), Nyumba360 makes listing cheap and monetizes **intent**: the seeker who is serious enough to call is the one who pays. Three revenue streams stack on top of each other:

| # | Revenue Stream | Who Pays | Amount (default) |
|---|---|---|---|
| 1 | **Contact Unlock** — reveal exact location + phone number of one house | House seeker | TZS 1,000 per house |
| 2 | **Broker Access Pass** — permission to operate on the platform | Broker | TZS 5,000 per week |
| 3 | **Landlord Plans** — tiered by portfolio size | Landlord | Tiered monthly plans |

**Every price on the platform is admin-configurable** — the unlock fee, broker pass price and duration, and landlord plan tiers can all be changed from the admin settings panel at any time, without touching code.

---

## 2. Platform Roles

### 👑 Admin (You)
Full control of the platform: sets and adjusts all pricing, reviews and approves KYC for landlords and brokers, approves listings before they go public, monitors all revenue (unlocks, broker passes, landlord plans), resolves disputes, and views platform-wide analytics.

### 🏘️ Landlord
Registers, completes **KYC verification**, subscribes to a plan sized to their portfolio, lists their houses (photos, video, price, area), keeps availability status accurate, and receives calls from seekers who have paid to unlock their contact.

### 🤝 Broker
Registers, completes **KYC verification**, pays the **weekly access pass (TZS 5,000)** to activate their account. While the pass is active they can list houses, respond to seekers, and appear in search results. When the pass expires, their listings are hidden and their dashboard is locked until they renew.

### 🧑 House Seeker
Browses everything free of charge. Completes a short **preference survey** on first visit, which powers a **personalized, dynamic landing page**. When ready to contact a landlord/broker about a specific house, pays **TZS 1,000** via mobile money and instantly sees the exact location (map pin + street) and phone number — permanently saved in their "Unlocked Houses" list.

---

## 3. 💰 Money Flow — The Heart of the System

### 3.1 The three money pipes

```
 ┌─────────────────────┐   TZS 1,000 / house    ┌──────────────────────────┐
 │    HOUSE SEEKER      │ ─────────────────────► │                          │
 │  (browses free,      │   M-Pesa / Airtel /    │                          │
 │   pays to contact)   │   Mixx by Yas          │                          │
 └─────────────────────┘                         │                          │
                                                 │       NYUMBA360          │
 ┌─────────────────────┐   TZS 5,000 / week     │    (Platform Wallet)     │
 │       BROKER         │ ─────────────────────► │                          │
 │  (pays for access)   │                        │  • Instant confirmation  │
 └─────────────────────┘                         │  • PDF receipt issued    │
                                                 │  • Ledger entry logged   │
 ┌─────────────────────┐   Monthly plan          │  • Daily reconciliation  │
 │      LANDLORD        │ ─────────────────────► │                          │
 │  (pays by portfolio  │                        └──────────────────────────┘
 │   size)              │                                    │
 └─────────────────────┘                                     ▼
                                                  100% = Nyumba360 revenue
```

**Key advantage of this model:** Nyumba360 never holds anyone else's money. Rent is paid directly between tenant and landlord outside the platform (or via a future in-app rent module). Every shilling that enters the platform wallet **is platform revenue** — no settlements, no escrow, and a far simpler regulatory position. (Confirm final licensing requirements with a Tanzanian legal advisor before launch; collecting your own service fees via mobile money is the simplest possible posture.)

### 3.2 Stream 1 — Contact Unlock (TZS 1,000 per house)

**What's free:** photos, video, price, deposit, house type, rooms, ward/district-level area, availability status, reviews.

**What's locked behind TZS 1,000:**
- Exact location: map pin, street name, directions
- Landlord's or broker's phone number (tap-to-call / tap-to-WhatsApp)

**Unlock flow, step by step:**
1. Seeker taps **"Unlock Contact — TZS 1,000"** on a house page.
2. System first runs an **availability check** — if the house is marked *Taken*, the button is disabled and payment is impossible (see Section 4).
3. Seeker chooses M-Pesa, Airtel Money, or Mixx by Yas → USSD push lands on their phone → they enter PIN.
4. Mobile money callback confirms the transaction → unlock is granted **instantly**.
5. The house page reveals the map pin, street, and phone number. A PDF receipt (e.g. `UNL-2026-004521`) is issued.
6. The house is saved permanently to the seeker's **"My Unlocked Houses"** list — they never pay twice for the same house.
7. The landlord/broker gets a notification: *"A verified seeker has unlocked your listing 'Self-contained, Sinza' and may call you."* — this also tells owners the platform is working for them.

**Fairness & trust rules (critical for word-of-mouth):**
- **No pay-for-nothing:** unlocking is blocked on houses marked Taken or Under Maintenance.
- **Grace credit:** if a seeker unlocks a house and it is marked Taken within a short admin-defined window (e.g. 24 hours), the seeker automatically receives an **unlock credit** to use on another house. This one rule protects the platform's reputation more than anything else.
- **One price, forever access:** an unlock never expires for that house.
- **Optional bundles (admin-configurable):** e.g. 5 unlocks for TZS 4,000 — increases average order value for serious searchers.

### 3.3 Stream 2 — Broker Access Pass (TZS 5,000 / week)

- A broker account exists in three states: **Registered → KYC Verified → Active (pass paid)**. Only *Active* brokers can list houses and be contacted.
- Payment via mobile money activates the pass instantly; a countdown ("Pass expires in 3 days") is always visible on the broker dashboard.
- **Expiry behavior:** listings are hidden (not deleted), dashboard becomes read-only, and a renewal reminder SMS goes out 24 hours before expiry. Renewal restores everything instantly.
- **Admin-configurable:** price, duration (weekly / monthly options), grace period, and promotional pricing (e.g. first week free) — all adjustable from settings.
- Auto-renew option: broker can opt in to an automatic weekly charge prompt.

### 3.4 Stream 3 — Landlord Plans (tiered by portfolio size)

Landlords pay according to how many houses they manage. Suggested defaults (every number editable by admin):

| Plan | Price / month | Active Listings | Extras |
|---|---|---|---|
| **Starter** | TZS 10,000 | Up to 3 houses | Standard listing |
| **Growth** | TZS 25,000 | Up to 10 houses | 1 featured listing slot |
| **Portfolio** | TZS 60,000 | Up to 30 houses | 3 featured slots, priority in search |
| **Estate** | TZS 150,000+ | Unlimited | Featured slots, dedicated support, analytics |

- A landlord with an expired plan keeps their account and data, but listings above the free threshold are hidden until renewal.
- Upgrades are prorated; downgrades apply at the next billing cycle.
- Optional **free tier** (e.g. 1 house free) can be enabled by admin to seed supply in the early months.

### 3.5 The Pricing Control Panel (Admin)

A single settings screen where you control the entire economy without a developer:

- Unlock fee amount and bundle pricing
- Grace-credit window for unlocks on houses that turn out to be taken
- Broker pass price, duration, and grace period
- Landlord plan names, prices, and listing limits
- Featured listing price
- Promotional campaigns (e.g. "Unlock at TZS 500 this weekend")

Every price change is recorded in the audit log (who changed it, when, from what to what), and historical transactions always keep the price that applied at the time.

### 3.6 Example month (illustrative)

| Metric | Value |
|---|---|
| Active seekers unlocking | 3,000 unlocks × TZS 1,000 = **TZS 3.0M** |
| Active brokers | 120 × TZS 5,000 × 4 weeks = **TZS 2.4M** |
| Landlord plans | 80 Starter + 30 Growth + 8 Portfolio ≈ **TZS 2.0M** |
| **Total monthly revenue** | **≈ TZS 7.4M** |

*(Planning figures only — real numbers depend on traffic, supply, and retention.)*

---

## 4. ✅ Availability Engine ("Is this house still free?")

Nothing kills trust faster than paying TZS 1,000 for a house that was rented two weeks ago. Availability is therefore a first-class system, not a checkbox:

- **Three statuses:** Available 🟢 / Taken 🔴 / Under Maintenance 🟡 — shown clearly on every card and detail page.
- **Unlock protection:** the pay button is hard-disabled on any house that is not Available.
- **One-tap status update:** landlords and brokers mark a house Taken directly from a notification or dashboard — made deliberately effortless.
- **Freshness nudges:** if a listing hasn't been confirmed in X days (admin-set, e.g. 14), the owner gets an SMS: *"Is 'Self-contained, Sinza' still available? Tap YES or NO."* No response → listing is flagged *"Status not recently confirmed"* and demoted in search.
- **Crowd signal:** seekers who called can report *"I was told it's taken"* — two independent reports auto-flag the listing for review.
- **Accountability:** owners whose houses are repeatedly unlocked while actually taken face escalating consequences: warning → listing suspension → account review. This is enforced because each false unlock costs the platform a grace credit.
- **Auto-expiry:** listings inactive beyond a threshold are archived until the owner reactivates them.

---

## 5. 🪪 KYC — Verified Landlords & Verified Brokers

Seekers are paying real money to get a phone number. That number must belong to a real, accountable person. KYC is what makes the TZS 1,000 worth paying.

### Landlord KYC
1. Full name, phone (verified by OTP), email
2. **NIDA number** + photo of NIDA card (or passport)
3. **Selfie for liveness match** against the ID
4. **Proof of ownership or authority** for at least one property: title deed, offer letter, utility bill in their name, or local government (Mtaa/Serikali ya Mtaa) introduction letter
5. Admin review queue → Approve / Reject (with reason) / Request more info
6. On approval: **"✔ Verified Landlord"** badge on all their listings

### Broker KYC
1. Full name, phone (OTP-verified), email
2. **NIDA number** + ID photo + selfie liveness match
3. Business name and operating area(s)
4. Optional but boosted: business licence or brokers' association membership → earns a **"✔ Pro Broker"** badge and higher search ranking
5. Admin review → approval unlocks the ability to purchase the weekly pass

### KYC principles
- **Nothing goes public before verification.** Unverified accounts can draft listings but cannot publish.
- Documents are stored encrypted, visible only to admin, never shown to other users.
- Every review action (who approved, when, what documents) sits in the audit trail.
- Re-verification can be triggered by admin at any time (e.g. after complaints).
- The verified badge is shown *before* the seeker pays — it is a core part of what they are paying for.

---

## 6. 🎯 Preference Survey & Dynamic Landing Page

On first visit (and editable anytime from their profile), every seeker answers a 30-second survey:

1. **Where do you want to live?** (region → district → up to 3 preferred wards)
2. **Monthly budget?** (slider, e.g. TZS 100k–400k)
3. **House type?** (single room / self-contained / apartment / full house)
4. **Minimum rooms?**
5. **When do you want to move?** (now / within 1 month / within 3 months / just looking)
6. **What matters most?** (pick up to 3: price, security, water availability, near main road, near school, parking, fenced compound)

### What the survey powers

- **Dynamic landing page:** instead of a generic homepage, the seeker lands on *"Self-contained houses in Kinondoni under TZS 300,000"* — their own feed, ranked by match score (location match, budget fit, type, priorities, freshness, verified badge).
- **Match badges:** each card shows *"95% match"* so seekers immediately see why a house is being shown.
- **Instant alerts:** when a new house matching their profile is approved, they get an SMS/app notification — *"A new self-contained in Sinza at TZS 250,000 just listed."* Alerted seekers convert to paid unlocks at the highest rate on the platform.
- **Behavioral learning:** views, favourites, and unlocks continuously refine the feed (e.g. a seeker who keeps opening TZS 350k houses despite a 250k budget gets their range gently widened).
- **Demand intelligence for you:** the survey data aggregates into a demand heatmap — *"1,240 seekers want self-contained in Kinondoni under 300k, but only 85 listings exist."* This tells you exactly where to recruit landlords and brokers next, and is itself a sellable insight product later.

---

## 7. Core Features (Full Map)

### Listings
Multiple photos + one video per house; four types (single room, self-contained, apartment, full house); rooms & bathrooms; rent + deposit; Tanzania location hierarchy (Region → District → Ward → Street — street hidden until unlock); map coordinates (pin hidden until unlock); admin approval before going public.

### Search & Discovery (free)
Search by region/district/ward; filters for price, rooms, type; map view with **approximate** pins (exact pin after unlock); "houses near me"; favourites; personalized feed from the survey.

### Unlock & Contact (paid)
TZS 1,000 per house → exact pin, street, tap-to-call, tap-to-WhatsApp; permanent "My Unlocked Houses" list; PDF receipt per unlock; grace credit if the house turns out to be taken.

### Payments
Mobile money (M-Pesa, Airtel Money, Mixx by Yas) with USSD push and instant callback confirmation; every transaction gets a unique receipt number; full payment history per user; daily reconciliation report for admin.

### Notifications
SMS + in-app (WhatsApp-ready structure): new matching house alerts, broker pass expiry reminders, landlord plan renewal reminders, availability confirmation nudges, unlock notifications to owners.

### Security & Audit
Role-based access control; OTP phone verification for all accounts; optional 2FA; encrypted KYC document storage; soft deletes only; complete audit trail of payments, price changes, KYC decisions, and status changes.

---

## 8. Dashboards

| Dashboard | What it shows |
|---|---|
| **Admin** | Revenue split by stream (unlocks / broker passes / landlord plans), 12-month revenue chart, unlock conversion rate, KYC review queue, listing approval queue, availability-abuse flags, demand heatmap, top wards by unlocks |
| **Landlord** | Their listings + status, plan and renewal date, unlock count per listing ("14 seekers paid to get your number this month"), views vs unlocks funnel, availability confirmation prompts |
| **Broker** | Pass countdown + renew button, their listings, unlocks on their listings, profile views, ranking tips ("Add a video to rank higher") |
| **Seeker** | Personalized feed, My Unlocked Houses, favourites, unlock receipts, saved search alerts, editable preference survey |

---

## 9. Protecting the Model (Anti-Leakage)

- **Progressive disclosure:** everything a seeker needs to *decide* is free; only what they need to *act* is paid. This keeps browsing traffic high while protecting the paid asset.
- **Approximate map pins** pre-unlock (ward-level circle, not exact point).
- **No phone numbers anywhere in free content:** listing descriptions are auto-scanned; any phone number typed into a description or photo caption is stripped, and repeat offenders are flagged. Owners are told clearly: numbers in descriptions = listing rejected.
- **Watermarked photos** with the Nyumba360 logo, discouraging off-platform reposting.
- **Owner incentive alignment:** landlords and brokers *want* the unlock wall — it filters out unserious callers and proves the platform delivers leads (their dashboards count paid unlocks as evidence).

---

## 10. Roadmap

**Phase 1 — MVP (weeks 1–4):** Registration + OTP, KYC queues for landlords & brokers, listing creation + admin approval, free browsing with locked contact, TZS 1,000 unlock via mobile money, broker weekly pass, landlord plans, availability statuses, preference survey + basic personalized feed, receipts, admin pricing panel.

**Phase 2 (months 2–4):** Unlock bundles and promos, grace-credit automation, availability nudges + crowd reporting, match-score ranking, demand heatmap, featured listings, Excel/PDF reports, dark mode.

**Phase 3 (months 4–8):** Flutter mobile app on the same API, in-app masked calling (seeker calls through the app — number never exposed, zero leakage), WhatsApp notifications, referral program (brokers earn free pass days for inviting landlords).

**Phase 4:** Nationwide marketplace expansion, optional in-app rent payment module (requires aggregator/BoT compliance review), tenant-screening reports for landlords, partnerships for tenant insurance and rent financing.

---

## 11. KPIs That Matter

- **Unlock conversion rate** — unlocks ÷ detail-page views (the single most important number)
- **Grace-credit rate** — % of unlocks refunded because the house was taken (must stay very low; it measures listing honesty)
- Broker pass renewal rate (weekly retention)
- Landlord plan retention and upgrade rate
- Listing freshness — % of listings availability-confirmed within 14 days
- Survey completion rate and alert → unlock conversion
- Supply-demand gap per ward (from the demand heatmap)

---

*Nyumba360 — browse for free, pay only when you're ready to knock on the door.* 🏠
