create database if not exists coisas_emprestadas
character set utf8mb4;
use coisas_emprestadas;

create table if not exists Usuario(
	usuarioId int primary key auto_increment,
    usuarioNome varchar(50) not null,
    usuarioEmail varchar (50) not null,
    usuarioSenha varchar(60) not null,
    usuarioPontuacao int default 0
);

create table if not exists Item (
	ItemId int primary key auto_increment,
    ItemTitulo varchar(50) not null,
    ItemDescricao varchar(200),
    ItemCategoria varchar(50) not null default 'OUTROS',
    ItemUsuarioId int not null,
    foreign key (ItemUsuarioId)
		references coisas_emprestadas.Usuario(UsuarioId)
);

create table if not exists Emprestimo (
	EmprestimoId int primary key auto_increment,
    EmprestimoDevolucao date not null,
    EmprestimoAtivo bool default true,
    EmprestimoUsuarioId int not null,
    foreign key (EmprestimoUsuarioId)
		references coisas_emprestadas.Usuario(UsuarioId),
	EmprestimoItemId int not null,
	foreign key (EmprestimoItemId)
		references coisas_emprestadas.Item(ItemId)
);


