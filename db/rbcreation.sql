drop table if exists usuarios cascade;

create table usuarios(
    id      bigserial       constraint pk_usuarios primary key
  , email   varchar(255)    not null
  , nombre  varchar(255) unique
  , admin boolean default false
  , pass    varchar(60)     not null
  , token   char(60)
);

drop table if exists autores cascade;

create table autores(
    id bigserial constraint pk_autores primary key
  , nombre varchar(255) not null unique
);

drop table if exists categorias cascade;

create table categorias(
    id bigserial constraint pk_categorias primary key
  , categoria varchar(255) not null
);

drop table if exists libros cascade;

create table libros(
    id bigserial constraint pk_libros primary key
  , titulo varchar(255) not null
  , autor_autores bigint references autores (id)
  , autor_usuarios bigint references usuarios (id)
  , categoria bigint not null references categorias (id)
  , precio decimal not null
  , check ((autor_autores is null and autor_usuarios is not null) or
          (autor_autores is not null and autor_usuarios is null))
  , check (precio >= 0)
);

drop table if exists carritos cascade;

create table carritos(
    id bigserial constraint pk_carritos primary key
    , usuario bigint references usuarios (id) not null
    , libro bigint references libros (id) not null
);

drop table if exists comentarios cascade;

create table comentarios(
    id bigserial constraint pk_comentarios primary key
  , id_usuarios bigint references usuarios (id)
  , id_libros bigint references libros (id)
  , texto text
);

drop table if exists valoraciones cascade;

create table valoraciones(
    id bigserial constraint pk_valoraciones primary key
  , valoracion numeric
  , id_libro bigint references libros (id)
  , check (valoracion >= 0 and valoracion <= 5)
);
