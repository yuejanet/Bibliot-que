/*==============================================================*/
/* Nom de SGBD :  ORACLE Version 10gR2                          */
/* Date de création :  14/09/2020 17:56:47                      */
/*==============================================================*/


alter table EMPRUNINFO
   drop constraint FK_EMPRUNIN_ASSOCIATI_LIVRE;

alter table EMPRUNINFO
   drop constraint FK_EMPRUNIN_ASSOCIATI_STUDENT;

alter table LIVRE
   drop constraint FK_LIVRE_ASSOCIATI_CLASSMEN;

drop table ADMINISTRATEUR cascade constraints;

drop table CLASSMENT cascade constraints;

drop index ASSOCIATION_2_FK;

drop index ASSOCIATION_1_FK;

drop table EMPRUNINFO cascade constraints;

drop index ASSOCIATION_3_FK;

drop table LIVRE cascade constraints;

drop table STUDENT cascade constraints;

/*==============================================================*/
/* Table : ADMINISTRATEUR                                       */
/*==============================================================*/
create table ADMINISTRATEUR  (
   AID                  VARCHAR2(12)                    not null,
   SNAME                VARCHAR2(12)                    not null,
   APWD                 VARCHAR2(30)                    not null,
   constraint PK_ADMINISTRATEUR primary key (AID)
);

/*==============================================================*/
/* Table : CLASSMENT                                            */
/*==============================================================*/
create table CLASSMENT  (
   CID                  VARCHAR2(12)                    not null,
   CNAME                VARCHAR2(12)                    not null,
   constraint PK_CLASSMENT primary key (CID)
);

/*==============================================================*/
/* Table : EMPRUNINFO                                           */
/*==============================================================*/
create table EMPRUNINFO  (
   EID                  VARCHAR2(12)                    not null,
   SID                  VARCHAR2(12)                    not null,
   ISBN                 VARCHAR2(20)                    not null,
   ETIME                DATE                            not null,
   RTIME                DATE                            not null,
   constraint PK_EMPRUNINFO primary key (EID)
);

/*==============================================================*/
/* Index : ASSOCIATION_1_FK                                     */
/*==============================================================*/
create index ASSOCIATION_1_FK on EMPRUNINFO (
   ISBN ASC
);

/*==============================================================*/
/* Index : ASSOCIATION_2_FK                                     */
/*==============================================================*/
create index ASSOCIATION_2_FK on EMPRUNINFO (
   SID ASC
);

/*==============================================================*/
/* Table : LIVRE                                                */
/*==============================================================*/
create table LIVRE  (
   ISBN                 VARCHAR2(20)                    not null,
   CID                  VARCHAR2(12)                    not null,
   TITRE                VARCHAR2(50)                    not null,
   AUTHEUR              VARCHAR2(12)                    not null,
   PUBLISHER            VARCHAR2(50),
   SOMMAIRE             VARCHAR2(200),
   constraint PK_LIVRE primary key (ISBN)
);

/*==============================================================*/
/* Index : ASSOCIATION_3_FK                                     */
/*==============================================================*/
create index ASSOCIATION_3_FK on LIVRE (
   CID ASC
);

/*==============================================================*/
/* Table : STUDENT                                              */
/*==============================================================*/
create table STUDENT  (
   SID                  VARCHAR2(12)                    not null,
   SNAME                VARCHAR2(12)                    not null,
   SPWD                 VARCHAR2(30)                    not null,
   DEPARTEMENT          VARCHAR2(12)                    not null,
   STATUS               VARCHAR2(2),
   constraint PK_STUDENT primary key (SID)
);

alter table EMPRUNINFO
   add constraint FK_EMPRUNIN_ASSOCIATI_LIVRE foreign key (ISBN)
      references LIVRE (ISBN);

alter table EMPRUNINFO
   add constraint FK_EMPRUNIN_ASSOCIATI_STUDENT foreign key (SID)
      references STUDENT (SID);

alter table LIVRE
   add constraint FK_LIVRE_ASSOCIATI_CLASSMEN foreign key (CID)
      references CLASSMENT (CID);

