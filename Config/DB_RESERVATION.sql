/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  24/03/2023 08:51:35                      */
/*==============================================================*/
CREATE DATABASE IF NOT EXISTS db_reservation;

USE db_reservation;

drop table if exists CLIENT;

drop table if exists LOCALITE;

drop table if exists PAIEMENT;

drop table if exists PROPRIETAIRE_SALLE;

drop table if exists RESERVATION;

drop table if exists SALLE;

drop table if exists TYPE_DE_SALLE;

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT
(
   ID                   int not null auto_increment,
   NOM                  varchar(254),
   PRENOM               varchar(254),
   EMAIL                varchar(254),
   primary key (ID)
);

/*==============================================================*/
/* Table : LOCALITE                                             */
/*==============================================================*/
create table LOCALITE
(
   IDLOCALITE           int not null auto_increment,
   NOM_LOCALITE         varchar(254),
   primary key (IDLOCALITE)
);

/*==============================================================*/
/* Table : PAIEMENT                                             */
/*==============================================================*/
create table PAIEMENT
(
   IDPAIEMENT           int not null auto_increment,
   MONTANT              numeric(8,0),
   MODE_DE_PAIEMENT     varchar(254),
   primary key (IDPAIEMENT)
);

/*==============================================================*/
/* Table : PROPRIETAIRE_SALLE                                   */
/*==============================================================*/
create table PROPRIETAIRE_SALLE
(
   IDPROPRIETAIRE       int not null auto_increment,
   NOM     varchar(254),
   EMAIL  varchar(254),
   TELEPHONE     varchar(254),
   ADRESSE     varchar(254),
   AVATAR     varchar(254),
   primary key (IDPROPRIETAIRE)
);

/*==============================================================*/
/* Table : RESERVATION                                          */
/*==============================================================*/
create table RESERVATION
(
   IDRESERVATION        int not null auto_increment,
   IDPAIEMENT           int,
   ID                   int not null,
   IDSALLE              int not null,
   DATE_DE_DEBUT        datetime,
   DATE_DE_FIN          datetime,
   primary key (IDRESERVATION)
);

/*==============================================================*/
/* Table : SALLE                                                */
/*==============================================================*/
create table SALLE
(
   IDSALLE              int not null auto_increment,
   IDTYPE_DE_SALLE      int not null,
   IDLOCALITE           int not null,
   IDPROPRIETAIRE       int not null,
   NBRE_BATH          int,
   NBRE_BED          int,
   PARKING              bool,
   PRIX                 numeric(20,0),
   primary key (IDSALLE)
);

/*==============================================================*/
/* Table : TYPE_DE_SALLE                                        */
/*==============================================================*/
create table TYPE_DE_SALLE
(
   IDTYPE_DE_SALLE      int not null auto_increment,
   NOM_TYPE_BIEN        varchar(254),
   primary key (IDTYPE_DE_SALLE)
);

# -----------------------------------------------------------------------------
#       TABLE : UTILISATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS UTILISATEUR
 (
   ID_USER INTEGER(2) NOT NULL AUTO_INCREMENT  ,
   EMAIL CHAR(32) NULL  ,
   PASSWORD CHAR(32) NULL  ,
   ROLE CHAR(32) NULL  ,
   ETAT INTEGER(2) NULL  ,
   ID_KEY CHAR(32) NULL  
   , PRIMARY KEY (ID_USER) 
 ) 

alter table RESERVATION add constraint FK_approuver foreign key (IDPAIEMENT)
      references PAIEMENT (IDPAIEMENT) on delete restrict on update restrict;

alter table RESERVATION add constraint FK_concerner foreign key (IDSALLE)
      references SALLE (IDSALLE) on delete restrict on update restrict;

alter table RESERVATION add constraint FK_faire foreign key (ID)
      references CLIENT (ID) on delete restrict on update restrict;

alter table SALLE add constraint FK_correspondre foreign key (IDTYPE_DE_SALLE)
      references TYPE_DE_SALLE (IDTYPE_DE_SALLE) on delete restrict on update restrict;

alter table SALLE add constraint FK_localiser foreign key (IDLOCALITE)
      references LOCALITE (IDLOCALITE) on delete restrict on update restrict;

alter table SALLE add constraint FK_posseder foreign key (IDPROPRIETAIRE)
      references PROPRIETAIRE_SALLE (IDPROPRIETAIRE) on delete restrict on update restrict;

