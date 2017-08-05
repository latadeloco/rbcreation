insert into usuarios(email, nombre, admin,  pass) values
    ('jesusroblessanchez@gmail.com', 'admin', true, crypt('admin', gen_salt('bf')));
insert into usuarios(email, nombre, pass) values
    ('juan@juan.com', 'juan', crypt('juan', gen_salt('bf')));

insert into categorias(categoria) values
    ('TERROR'),
    ('HISTORIA'),
    ('DRAMA'),
    ('POLICIACA'),
    ('AUTOBIOGRAFIAS'),
    ('CIENCIA FICCION');

insert into autores(nombre) values
    ('Antoine de Saint-Exupéry'),
    ('Gema Samaro');

insert into libros(titulo, autor_autores, categoria, precio) values
    ('El principito',  1, 5, '12.12'),
    ('Cualquiera menos tú', 2, 3, '2.3');

insert into carritos(usuario, libro) values
    (2, 1);
