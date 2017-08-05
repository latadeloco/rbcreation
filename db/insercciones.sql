insert into usuarios(email, nombre, pass) values
    ('jesusroblessanchez@gmail.com', 'admin', crypt('admin', gen_salt('bf')));

insert into categorias(categoria) values
    ('TERROR'),
    ('HISTORIA'),
    ('POLICIACA'),
    ('CIENCIA FICCION');

insert into autores(nombre) values
    ('Antoine de Saint-Exupéry');

insert into libros(titulo, autor_autores, categoria) values
    ('El principito',  1, 1);
