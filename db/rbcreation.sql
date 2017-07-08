drop table if exists usuarios cascade;

create table usuarios(
    id      bigserial       constraint pk_usuarios primary key,
    nombre  varchar(255)    not null,
    pass    varchar(60)     not null
);
insert into usuarios(nombre, pass) values
    ('admin', crypt('admin', gen_salt('bf'))),
    ('jose', crypt('jose', gen_salt('bf')));
