ALTER TABLE users
ADD isAdmin Boolean DEFAULT false;

ALTER TABLE admins
ADD isAdmin BOOLEAN DEFAULT true;