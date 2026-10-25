Guest Service Report Lifecycle and Access Rules

1. Purpose

Define the lifecycle, access rules, data ownership, and cleanup strategy for temporary guest Service Reports.

This document describes the intended design. It does not implement application changes.

2. Guest Session Identity

Every guest visit must have a unique, cryptographically random guest_session_id.

The server must establish and validate the guest session identity.

Every database record created by a guest must be associated with that guest's guest_session_id.

All records created during the same guest visit must use the same identifier.

Different guest visits must use different identifiers.

A guest must not be able to access or modify another guest's records by changing a record ID or request parameter.

The guest session identifier must not be treated as a substitute for server-side authorization checks.

3. Demo Data

A permanent demo customer and at least one demo office must be available for guest testing.

Demo data must be created independently of individual guest sessions.

Permanent demo records must not be assigned to a guest's guest_session_id.

Guest cleanup must never delete or modify permanent demo records.

4. Guest Limits

During one guest visit:

A maximum of two customers may be available, including the permanent demo customer.

Each customer may have a maximum of two offices, including any demo office belonging to that customer.

Only one Service Report may be created.

Limits must be enforced server-side, including when concurrent requests are made.

When a limit is reached, the system must display the registration or license message.

The interface should keep customer and office creation actions available while the corresponding limits permit them.

5. Customer and Office Management

Guests may use the permanent demo customer and its office.

Guests may create additional customers within the guest limits.

Guests may create offices for customers they are permitted to use.

Guest-created customers and offices must be associated with the current guest_session_id.

Guest-created records must not become permanent or be transferred to another guest session implicitly.

6. Guest Service Report

A guest may create one temporary Service Report per visit.

The report must be associated with the current guest_session_id.

The guest may save, reopen, and continue working on the report during the active visit.

The report must reference a valid customer office.

Guests must not be able to access reports belonging to other guest sessions or authenticated users.

7. Restricted Actions

The email delivery button must remain visible to guests.

Email delivery must not be performed for guests.

Clicking the email delivery button must display the same registration or license message used when a guest attempts to create an additional Service Report.

Attempts to create a second Service Report must display that message as well.

Suggested message:

Unlock More Possibilities

Register for an account or obtain the appropriate license to create additional Service Reports and use email delivery.

Actions:

Register / Log in

Learn About Licenses

8. Cleanup and Retention

Returning to the portfolio homepage must trigger cleanup of the current guest's temporary data.

Cleanup must be scoped to the current guest_session_id.

Cleanup must remove only temporary records owned by that guest session.

Cleanup must preserve permanent demo records and records belonging to other guests or authenticated users.

Foreign-key dependencies must be respected when deleting guest-created records.

Customer and office records must not be deleted if they are referenced by records that must be retained.

Closing a browser cannot reliably notify the server. Therefore, immediate deletion on browser closure cannot be guaranteed.

A server-side scheduled cleanup process must remove abandoned guest data as a fallback.

Server-side access checks must prevent expired or cleaned-up guest sessions from accessing temporary records.

The retention interval for abandoned sessions must be decided before implementation.

9. Authenticated Users

Authenticated users' Service Reports and related data must follow separate account-based access and retention rules.

Existing role relationships and permissions must remain intact.

Guest cleanup must never delete or modify authenticated users' data.

Any future transfer of guest data to an authenticated account requires an explicit design and authorization rules.

10. Existing Database Considerations

The current database contains:

customers

customer_offices

service_reports

service_report_user_roles

The existing relationships are:

Customer has many CustomerOffice records.

CustomerOffice belongs to Customer.

CustomerOffice has many ServiceReport records.

ServiceReport has user-role relationships.

Implementation must inspect existing constraints and data requirements before adding migrations. In particular, the current Service Report schema requires customer_office_id, description, started_at, and finished_at. The guest creation flow must account for these requirements.

The final implementation must decide how to represent guest ownership across all guest-created records without weakening existing foreign-key constraints or authenticated-user access rules.

11. Acceptance Criteria

Each guest visit has a unique server-validated identifier.

Every guest-created database record is associated with that identifier.

One guest cannot access or delete another guest's data.

A guest can use the permanent demo customer and office.

A guest can use no more than two customers and two offices per customer.

A guest can create only one Service Report per visit.

Email delivery remains visible but is blocked for guests.

Restricted actions show the registration or license message.

Returning to the homepage triggers cleanup of the current guest's temporary data.

Scheduled cleanup removes abandoned temporary data without affecting other sessions.

Permanent demo data and authenticated-user data remain intact.

All limits and ownership rules are enforced server-side.

12. Implementation Status

Design only. No application code, database migrations, routes, or user-facing functionality have been changed as part of this document.
