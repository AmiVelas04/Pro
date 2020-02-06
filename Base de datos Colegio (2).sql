 create table usuario
 (id_usu int(10) not null primary key auto_increment, 
 usuario varchar(100),
 pass varchar(100),
 tipo int(1)
 );
 
 create table alumno(
 cod_al varchar(10) not null primary key,
 nombre varchar(500),
 edad int(3),
 fofografia varchar(500)
 );
 
 create table encargado(
 id_enc int(10) not null primary key auto_increment,
 nombre varchar(200),
 dpi varchar(15)
 );
 
 create table telefono(
 id_tel int(10) not null primary key auto_increment,
 telefono varchar(15) 
 );
 
 create table direccion(
 id_dir int(10) not null primary key auto_increment,
 direccion varchar(400)  );
 
 create table catedratico(
 id_cat int(10) not null primary key auto_increment,
 id_usu int(10),
 nombre varchar(250),
 dpi varchar(15),
profesion varchar(250) ,
fotografia varchar(500)
 );
 
 create table grado(
 id_grado int(10) not null primary key auto_increment,
 grado varchar(512)
  );
  
  create table carrera(
  id_carr int(10) not null primary key auto_increment,
  carrera varchar(500)
  );
  
  create table aviso(
  id_aviso int(10) not null primary key auto_increment,
  motivo varchar(10),
  descripcion text(655000),
  fecha date
  );
  
  create table periodo(
  id_peri int(10) not null primary key auto_increment,
  periodo varchar(200)
  );
  
  create table asigna_dir_al(
  cod_al varchar(10) not null ,
  id_dir int(10) not null,
  primary key(cod_al,id_dir),
   constraint A_alum foreign key(cod_al) references alumno(cod_al)
  on delete restrict on update restrict,
   constraint A_dir foreign key(id_dir) references direccion(id_dir)
  on delete restrict on update restrict
);

create table asigna_encar(
id_enc int(10) not null ,
cod_al varchar(10) not null,
primary key(id_enc,cod_al),
 constraint a_enc_alu1 foreign key(id_enc) references encargado(id_enc)
on delete restrict on update restrict,
 constraint a_enc_alu2 foreign key(cod_al) references alumno(cod_al)
on delete restrict on update restrict
);

create table asigna_tel_enc(
id_enc int(10) not null ,
id_tel int(10) not null ,
 primary key(id_enc,id_tel),
 constraint a_tel_enc1 foreign key(id_enc) references encargado(id_enc)
on delete restrict on update restrict,
 constraint a_tel_enc2 foreign key(id_tel) references telefono(id_tel)
on delete restrict on update restrict
);

create table asigna_alum(
cod_al varchar(10) not null,
id_carr int(10) not null ,
id_grado int(10) not null ,
primary key(cod_al,id_carr,id_grado),
 constraint asigna_al1 foreign key(cod_al) references alumno(cod_al)
on delete restrict on update restrict,
 constraint asigna_al2 foreign key(id_carr) references carrera(id_carr)
on delete restrict on update restrict,
 constraint asigna_al3 foreign key(id_grado) references grado(id_grado)
on delete restrict on update restrict
);

create table asigna_tel_cat(
id_tel int(10) not null,
id_cat int(10) not null,
 primary key(id_tel,id_cat),
 constraint asignacattel1 foreign key(id_tel) references telefono(id_tel)
on delete restrict on update restrict,
 constraint asignacattel2 foreign key(id_cat) references catedratico(id_cat)
on delete restrict on update restrict
);


create table curso(
id_curso int(10) not null auto_increment,
nombre varchar(250), 
id_carr int(10),
id_grado int(10),
primary key(id_curso),
 constraint curso_carr foreign key(id_carr) references carrera(id_carr)
on delete restrict on update restrict);

create table asign_aviso(
id_aviso int(10) not null,
id_cat int(10) not null,
primary key(id_aviso,id_cat),
 constraint asignaavis1 foreign key(id_aviso) references aviso(id_aviso)
on delete restrict on update restrict,
 constraint asignaavis2 foreign key (if_cat) references catedratico(id_cat)
on delete restrict on update restrict
);

create table calificacion(
id_cali int(20) not null auto_increment,
id_curso int(10), 
cod_al varchar(10),
primary key(id_cali),
constraint cali_cur foreign key(id_curso) references curso(id_curso)
on delete restrict on update restrict,
constraint cali_al foreign key(cod_al) references alumno(cod_al)
on delete restrict on update restrict
);

create table asigna_cur_cat(
id_curso int(10) not null,
id_cat int(10) not null,
primary key(id_curso,id_cat),
 constraint asigcurcat1 foreign key (id_curso) references curso(id_curso)
on delete restrict on update restrict,
 constraint asigcurcat2 foreign key(id_cat) references catedratico(id_cat)
on delete restrict on update restrict
);

create table detalle_cali(
id_detalle int(30) not null primary key auto_increment,
id_cali int(20) not null,
id_peri int(10),
t1 int(2),
t2 int(2),
t3 int(2),
pc1 int(2),
pc2 int(2),
examen int(2),
total int(2),
 constraint detcali foreign key (id_cali) references calificacion(id_cali)
on delete restrict on update restrict,
 constraint detperi foreign key (id_peri) references periodo(id_peri)
on delete restrict on update restrict
);



insert into usuario(usuario.pass,tipo, estado) values('admin','1532',1,'Activa')



  
 
 