CREATE TABLE portal(
  id_portal SERIAL NOT NULL,
  nm_portal VARCHAR(255) NOT NULL,
  site VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  PRIMARY KEY(id_portal)
);
CREATE TABLE noticia(
  id_noticia SERIAL NOT NULL,
  id_portal INTEGER NOT NULL,
  titulo VARCHAR(255) NOT NULL,
  data DATE NOT NULL,
  gravata VARCHAR(255) NOT NULL,
  conteudo VARCHAR(2048) NOT NULL,
  link VARCHAR(255) NOT NULL,
  PRIMARY KEY(id_noticia),
  FOREIGN KEY (id_portal) REFERENCES portal(id_portal)
);
CREATE TABLE imagens(
  id_imagem SERIAL NOT NULL,
  id_noticia INTEGER NOT NULL,
  imagem VARCHAR(255) NOT NULL,
  destaque BOOLEAN NOT NULL,
  PRIMARY KEY(id_imagem),
  FOREIGN KEY (id_noticia) REFERENCES noticia(id_noticia)
);
CREATE TABLE comentarios(
  id_comentario SERIAL NOT NULL,
  id_noticia INTEGER NOT NULL,
  comentario VARCHAR(2048) NOT NULL,
  email VARCHAR(255)NOT NULL,
  PRIMARY KEY(id_comentario),
  FOREIGN KEY (id_noticia) REFERENCES noticia(id_noticia)
);
