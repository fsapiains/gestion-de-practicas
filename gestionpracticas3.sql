--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: areas_tematicas; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE areas_tematicas (
    pk integer NOT NULL,
    tema character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE public.areas_tematicas OWNER TO air;

--
-- Name: areas_tematicas_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE areas_tematicas_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.areas_tematicas_pk_seq OWNER TO air;

--
-- Name: areas_tematicas_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE areas_tematicas_pk_seq OWNED BY areas_tematicas.pk;


--
-- Name: carreras; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE carreras (
    pk integer NOT NULL,
    codigo integer NOT NULL,
    nombre character varying(255) NOT NULL,
    escuela_fk integer NOT NULL
);


ALTER TABLE public.carreras OWNER TO air;

--
-- Name: carreras_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE carreras_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.carreras_pk_seq OWNER TO air;

--
-- Name: carreras_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE carreras_pk_seq OWNED BY carreras.pk;


--
-- Name: contactos_empresariales; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE contactos_empresariales (
    pk bigint NOT NULL,
    empresa_fk bigint NOT NULL,
    nombres character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    rut integer NOT NULL,
    telefono character varying(255) NOT NULL,
    email character varying(255) NOT NULL
);


ALTER TABLE public.contactos_empresariales OWNER TO air;

--
-- Name: contactos_empresariales_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE contactos_empresariales_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contactos_empresariales_pk_seq OWNER TO air;

--
-- Name: contactos_empresariales_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE contactos_empresariales_pk_seq OWNED BY contactos_empresariales.pk;


--
-- Name: departamentos; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE departamentos (
    pk integer NOT NULL,
    facultad_fk integer NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE public.departamentos OWNER TO air;

--
-- Name: departamentos_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE departamentos_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departamentos_pk_seq OWNER TO air;

--
-- Name: departamentos_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE departamentos_pk_seq OWNED BY departamentos.pk;


--
-- Name: empresas; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE empresas (
    pk bigint NOT NULL,
    rut integer NOT NULL,
    nombre_real character varying(255) NOT NULL,
    nombre_fantasia character varying(255) NOT NULL,
    direccion character varying(255) NOT NULL,
    rubro_fk integer NOT NULL,
    telefono character varying(255) NOT NULL,
    email character varying(255) NOT NULL
);


ALTER TABLE public.empresas OWNER TO air;

--
-- Name: empresas_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE empresas_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.empresas_pk_seq OWNER TO air;

--
-- Name: empresas_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE empresas_pk_seq OWNED BY empresas.pk;


--
-- Name: escuelas; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE escuelas (
    pk integer NOT NULL,
    departamento_fk integer NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE public.escuelas OWNER TO air;

--
-- Name: escuelas_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE escuelas_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.escuelas_pk_seq OWNER TO air;

--
-- Name: escuelas_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE escuelas_pk_seq OWNED BY escuelas.pk;


--
-- Name: estudiantes; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE estudiantes (
    pk bigint NOT NULL,
    rut integer NOT NULL,
    nombres character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    fecha_nacimiento date,
    genero integer DEFAULT 0 NOT NULL,
    direccion character varying(255) NOT NULL,
    telefono character varying(15),
    email character varying(255) NOT NULL,
    estado character varying(255) NOT NULL,
    carrera_fk integer NOT NULL
);


ALTER TABLE public.estudiantes OWNER TO air;

--
-- Name: estudiantes_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE estudiantes_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estudiantes_pk_seq OWNER TO air;

--
-- Name: estudiantes_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE estudiantes_pk_seq OWNED BY estudiantes.pk;


--
-- Name: facultades; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE facultades (
    pk integer NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE public.facultades OWNER TO air;

--
-- Name: facultades_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE facultades_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.facultades_pk_seq OWNER TO air;

--
-- Name: facultades_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE facultades_pk_seq OWNED BY facultades.pk;


--
-- Name: practicas; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE practicas (
    pk bigint NOT NULL,
    carrera_fk integer NOT NULL,
    contacto_fk bigint NOT NULL,
    estudiante_fk bigint NOT NULL,
    fecha timestamp without time zone DEFAULT now() NOT NULL,
    fecha_inicio date NOT NULL,
    fecha_termino date,
    horas integer DEFAULT 0 NOT NULL,
    evaluacion numeric(2,1) DEFAULT 0::numeric NOT NULL,
    archivo character varying(255),
    areas_tematica_fk integer NOT NULL
);


ALTER TABLE public.practicas OWNER TO air;

--
-- Name: practicas_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE practicas_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.practicas_pk_seq OWNER TO air;

--
-- Name: practicas_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE practicas_pk_seq OWNED BY practicas.pk;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE roles (
    pk integer NOT NULL,
    rol character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE public.roles OWNER TO air;

--
-- Name: roles_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE roles_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_pk_seq OWNER TO air;

--
-- Name: roles_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE roles_pk_seq OWNED BY roles.pk;


--
-- Name: roles_usuarios; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE roles_usuarios (
    pk integer NOT NULL,
    usuario_fk integer NOT NULL,
    rol_fk integer NOT NULL
);


ALTER TABLE public.roles_usuarios OWNER TO air;

--
-- Name: roles_usuarios_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE roles_usuarios_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_usuarios_pk_seq OWNER TO air;

--
-- Name: roles_usuarios_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE roles_usuarios_pk_seq OWNED BY roles_usuarios.pk;


--
-- Name: rubros; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE rubros (
    pk integer NOT NULL,
    rubro character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE public.rubros OWNER TO air;

--
-- Name: rubros_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE rubros_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rubros_pk_seq OWNER TO air;

--
-- Name: rubros_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE rubros_pk_seq OWNED BY rubros.pk;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: air; Tablespace: 
--

CREATE TABLE usuarios (
    id integer NOT NULL,
    rut integer NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(64)
);


ALTER TABLE public.usuarios OWNER TO air;

--
-- Name: usuarios_pk_seq; Type: SEQUENCE; Schema: public; Owner: air
--

CREATE SEQUENCE usuarios_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_pk_seq OWNER TO air;

--
-- Name: usuarios_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: air
--

ALTER SEQUENCE usuarios_pk_seq OWNED BY usuarios.id;


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY areas_tematicas ALTER COLUMN pk SET DEFAULT nextval('areas_tematicas_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY carreras ALTER COLUMN pk SET DEFAULT nextval('carreras_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY contactos_empresariales ALTER COLUMN pk SET DEFAULT nextval('contactos_empresariales_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY departamentos ALTER COLUMN pk SET DEFAULT nextval('departamentos_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY empresas ALTER COLUMN pk SET DEFAULT nextval('empresas_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY escuelas ALTER COLUMN pk SET DEFAULT nextval('escuelas_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY estudiantes ALTER COLUMN pk SET DEFAULT nextval('estudiantes_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY facultades ALTER COLUMN pk SET DEFAULT nextval('facultades_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY practicas ALTER COLUMN pk SET DEFAULT nextval('practicas_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY roles ALTER COLUMN pk SET DEFAULT nextval('roles_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY roles_usuarios ALTER COLUMN pk SET DEFAULT nextval('roles_usuarios_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY rubros ALTER COLUMN pk SET DEFAULT nextval('rubros_pk_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: air
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_pk_seq'::regclass);


--
-- Data for Name: areas_tematicas; Type: TABLE DATA; Schema: public; Owner: air
--

COPY areas_tematicas (pk, tema, descripcion) FROM stdin;
1	Administración de personal 	
2	Administración de procesos	
3	Agricultura y ganadería	
4	Alimentación y hospedaje	
5	Ciencias económicas y sociales	
6	Comercio y ventas	
7	Diseño y exhibición	
8	Exploración y extracción	
9	Finanzas y contabilidad	
10	Física y química	
11	Informática y desarrollo de sistemas	
12	Manufactura de productos químicos	
13	Planeación y supervisión	
14	Producción y biotecnología	
15	Publicación y medios	
16	Tecnología de procesos industriales	
17	Tecnología mecánica	
18	Tecnología electrónica	
19	Tecnología eléctrica	
20	Telefonía y comunicaciones	
21	Seguridad pública	
22	otra	no se encuentra en el listado
\.


--
-- Name: areas_tematicas_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('areas_tematicas_pk_seq', 22, true);


--
-- Data for Name: carreras; Type: TABLE DATA; Schema: public; Owner: air
--

COPY carreras (pk, codigo, nombre, escuela_fk) FROM stdin;
2	21041	Ingeniería civil en computación	6
3	21047	Arquitectura	8
4	21030	Ingeniería en informática	6
5	21088	Cartografía y geomática	3
6	21043	Trabajo social	4
7	21080	ingeniería química	11
8	21075	Ingeniería civil electrónica	5
9	21015	Ingeniería en administración agroindustrial	12
10	21002	Bibliotecología y documentación	9
11	21032	Ingeniería en construcción	7
12	21012	Contador público y auditor	14
\.


--
-- Name: carreras_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('carreras_pk_seq', 12, true);


--
-- Data for Name: contactos_empresariales; Type: TABLE DATA; Schema: public; Owner: air
--

COPY contactos_empresariales (pk, empresa_fk, nombres, apellidos, rut, telefono, email) FROM stdin;
3	1	Juan isaac	Ruiz Campos	8972600	24782758	jruiz@tecza.cl
5	1	Alejandro	Nuñez	1812092	12345678	hola@hola.cl
8	1	Luis	Muñoz	550552	12345678	luis@hola.cl
\.


--
-- Name: contactos_empresariales_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('contactos_empresariales_pk_seq', 8, true);


--
-- Data for Name: departamentos; Type: TABLE DATA; Schema: public; Owner: air
--

COPY departamentos (pk, facultad_fk, nombre, descripcion) FROM stdin;
1	1	Diseño	\N
2	1	Cartografía	\N
3	1	Trabajo Social	\N
4	1	Humanidades	\N
5	2	Prevención de Riesgos y Medioambiente	\N
6	2	Ciencias de la Construcción	\N
7	2	Planificación y Ordenamiento Territorial	\N
8	3	Química	\N
9	3	Matemática	\N
10	3	Física	\N
11	3	Biotecnología	\N
12	4	Gestión Organizacional	\N
13	4	Economía, Recursos Naturales y Comercio Internacional	\N
14	4	Contabilidad y Gestión Financiera	\N
15	4	Gestión de la Información	\N
16	4	Estadística y Econometría	\N
17	5	Industria	\N
18	5	Informática y Computación	\N
19	5	Electricidad	\N
20	5	Mecánica	\N
\.


--
-- Name: departamentos_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('departamentos_pk_seq', 2, true);


--
-- Data for Name: empresas; Type: TABLE DATA; Schema: public; Owner: air
--

COPY empresas (pk, rut, nombre_real, nombre_fantasia, direccion, rubro_fk, telefono, email) FROM stdin;
1	983498589	teczacom	tecza	cuevas 645	2	24782758	hola@teczacom.cl
4	760269603	Administradora y Comercial La Florida Ltda.	Calzados Florida	valentin 456	13	72738344	calzadosflorida@florida.cl
5	396210010	Solar y fuentes Ltda.	Solarf	las palmas 1415	7	12345678	hokajfj@dg.cl
7	177711160	cueros Ltda	super cueros	hola 123	13	12345678	hola@cueros.cl
9	837446007	cueros Ltda	super cueros	hola 123	13	12345678	hola@cueros.cl
10	780721308	Trendy Ltda.	Helados trendy	Los helados 123	9	12345678	trendy@helados.cl
\.


--
-- Name: empresas_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('empresas_pk_seq', 10, true);


--
-- Data for Name: escuelas; Type: TABLE DATA; Schema: public; Owner: air
--

COPY escuelas (pk, departamento_fk, nombre, descripcion) FROM stdin;
2	1	Escuela de diseño	NULL
3	2	Escuela de cartografía	
4	3	Escuela de trabajo social	
5	19	Escuela de electrónica	
6	18	Escuela de informática	
7	6	Escuela de construcción civil	
8	7	Escuela de arquitectura	
9	15	Escuela de Bibliotecología	
10	17	Escuela de industria	
11	8	Escuela de química	
12	13	Escuela de administración	
13	13	Escuela de economía	
14	14	Escuela de contador	
\.


--
-- Name: escuelas_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('escuelas_pk_seq', 14, true);


--
-- Data for Name: estudiantes; Type: TABLE DATA; Schema: public; Owner: air
--

COPY estudiantes (pk, rut, nombres, apellidos, fecha_nacimiento, genero, direccion, telefono, email, estado, carrera_fk) FROM stdin;
10	17771116	Jonathan Gregor	Leon Sepulveda	1992-02-01	1	Blindado blanco 1645	89342651	jonathan-leon@hotmail.com	Regular	2
12	16455011	Catalina Andrea	Frigerio Garcia	1985-02-11	0	one direction 771	34772721	aanizz@hotmail.com	Transferido	5
20	18074422	Jose Antonio	Concha Medina	1992-02-01	1	so pink 456	87639485	joseph_antony_192@hotmail.com	Regular	11
42	18048821	Natalia Andrea	Tarifeño Ortiz	1992-02-01	0	holahola123	12345678	nathiitha_92@live.com	Regular	2
43	17707063	Francisca Anali	Sapiains Carrasco	1992-02-01	0	Los pinos 456	12345678	keep.searching@hotmail.es	Regular	6
44	17925290	Victoria Del Carmen	Muñoz Brenet	1991-06-06	0	Frucola 123	12345678	victoriamunozb@hotmail.com	Regular	7
\.


--
-- Name: estudiantes_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('estudiantes_pk_seq', 44, true);


--
-- Data for Name: facultades; Type: TABLE DATA; Schema: public; Owner: air
--

COPY facultades (pk, nombre, descripcion) FROM stdin;
1	Humanidades y Tecnologías de la Comunicación Social	\N
2	Ciencias de la Construcción y Ordenamiento Territorial	\N
3	Ciencias Naturales, Matemática y del Medio Ambiente	\N
4	Administración y Economía	\N
5	Ingeniería	\N
\.


--
-- Name: facultades_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('facultades_pk_seq', 6, true);


--
-- Data for Name: practicas; Type: TABLE DATA; Schema: public; Owner: air
--

COPY practicas (pk, carrera_fk, contacto_fk, estudiante_fk, fecha, fecha_inicio, fecha_termino, horas, evaluacion, archivo, areas_tematica_fk) FROM stdin;
28	2	3	10	2014-06-29 20:27:23	2014-10-30	2015-01-15	320	0.0	\N	4
29	7	5	44	2014-06-30 17:27:41	1990-11-10	2015-01-15	320	1.0	\N	4
\.


--
-- Name: practicas_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('practicas_pk_seq', 29, true);


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: air
--

COPY roles (pk, rol, descripcion) FROM stdin;
1	Admin	\N
\.


--
-- Name: roles_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('roles_pk_seq', 1, true);


--
-- Data for Name: roles_usuarios; Type: TABLE DATA; Schema: public; Owner: air
--

COPY roles_usuarios (pk, usuario_fk, rol_fk) FROM stdin;
\.


--
-- Name: roles_usuarios_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('roles_usuarios_pk_seq', 2, true);


--
-- Data for Name: rubros; Type: TABLE DATA; Schema: public; Owner: air
--

COPY rubros (pk, rubro, descripcion) FROM stdin;
1	Artesania	Hola
2	Supermercado	\N
4	medicina	asjdkdfjkskj
5	Minería	
6	Agricultura	
7	Mecánica	
8	Electrónica	
9	Alimentos	
10	Hotelería	
11	Construcción	
12	Química	
13	textiles	
14	comercio	
\.


--
-- Name: rubros_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('rubros_pk_seq', 14, true);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: air
--

COPY usuarios (id, rut, password, remember_token) FROM stdin;
23	17876307	$2y$10$kvoD5N09IvfO6ztmHVga.OKBysqux15556VPy81UM5d/.oyyWQs2C	UNT4Fuoff7AjBKFuDHYM49fW9v2UltZSDUhK7O2aYHc7dbfneX7fUpT9Q4kT
24	18165383	$2y$10$.VQ923a09M.89a1N5rH7l./vX3fhhisyX8FlQwf04uH/ScnQnpFhG	IXY7uhIZDrILHxzrqMNBB6RiBFpMkCkdKAd2E315hGZpwlmPSvwHcDp7LrVF
28	18048821	$2y$10$RSPB1DLiZ73JAli9.mr0wOP2ygme.0b0jpfuYK2vl2DlFg8bq.2m2	\N
29	17707063	$2y$10$p6.56.XoQS9oNwI3u9HcduB.qJO/WKMzXNf6syJpGKjbqbj5eXX8a	\N
30	17925290	$2y$10$ycoEqGCsbcOFCJ0rLuJO7eiv9wePi5B7MbAzrwTpCNoTHPguiuX7C	\N
\.


--
-- Name: usuarios_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: air
--

SELECT pg_catalog.setval('usuarios_pk_seq', 30, true);


--
-- Name: areas_tematicas_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY areas_tematicas
    ADD CONSTRAINT areas_tematicas_pkey PRIMARY KEY (pk);


--
-- Name: areas_tematicas_tema_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY areas_tematicas
    ADD CONSTRAINT areas_tematicas_tema_key UNIQUE (tema);


--
-- Name: carreras_codigo_escuela_fk_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY carreras
    ADD CONSTRAINT carreras_codigo_escuela_fk_key UNIQUE (codigo, escuela_fk);


--
-- Name: carreras_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY carreras
    ADD CONSTRAINT carreras_pkey PRIMARY KEY (pk);


--
-- Name: contactos_empresariales_empresa_fk_rut_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY contactos_empresariales
    ADD CONSTRAINT contactos_empresariales_empresa_fk_rut_key UNIQUE (empresa_fk, rut);


--
-- Name: contactos_empresariales_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY contactos_empresariales
    ADD CONSTRAINT contactos_empresariales_pkey PRIMARY KEY (pk);


--
-- Name: departamentos_nombre_facultad_fk_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT departamentos_nombre_facultad_fk_key UNIQUE (nombre, facultad_fk);


--
-- Name: departamentos_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT departamentos_pkey PRIMARY KEY (pk);


--
-- Name: empresas_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY empresas
    ADD CONSTRAINT empresas_pkey PRIMARY KEY (pk);


--
-- Name: empresas_rut_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY empresas
    ADD CONSTRAINT empresas_rut_key UNIQUE (rut);


--
-- Name: escuelas_nombre_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY escuelas
    ADD CONSTRAINT escuelas_nombre_key UNIQUE (nombre);


--
-- Name: escuelas_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY escuelas
    ADD CONSTRAINT escuelas_pkey PRIMARY KEY (pk);


--
-- Name: estudiantes_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY estudiantes
    ADD CONSTRAINT estudiantes_pkey PRIMARY KEY (pk);


--
-- Name: estudiantes_rut_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY estudiantes
    ADD CONSTRAINT estudiantes_rut_key UNIQUE (rut);


--
-- Name: facultades_nombre_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY facultades
    ADD CONSTRAINT facultades_nombre_key UNIQUE (nombre);


--
-- Name: facultades_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY facultades
    ADD CONSTRAINT facultades_pkey PRIMARY KEY (pk);


--
-- Name: practicas_carrera_fk_contacto_fk_estudiante_fk_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY practicas
    ADD CONSTRAINT practicas_carrera_fk_contacto_fk_estudiante_fk_key UNIQUE (carrera_fk, contacto_fk, estudiante_fk);


--
-- Name: practicas_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY practicas
    ADD CONSTRAINT practicas_pkey PRIMARY KEY (pk);


--
-- Name: roles_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (pk);


--
-- Name: roles_rol_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_rol_key UNIQUE (rol);


--
-- Name: roles_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY roles_usuarios
    ADD CONSTRAINT roles_usuarios_pkey PRIMARY KEY (pk);


--
-- Name: roles_usuarios_usuario_fk_rol_fk_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY roles_usuarios
    ADD CONSTRAINT roles_usuarios_usuario_fk_rol_fk_key UNIQUE (usuario_fk, rol_fk);


--
-- Name: rubros_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY rubros
    ADD CONSTRAINT rubros_pkey PRIMARY KEY (pk);


--
-- Name: rubros_rubro_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY rubros
    ADD CONSTRAINT rubros_rubro_key UNIQUE (rubro);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: usuarios_rut_key; Type: CONSTRAINT; Schema: public; Owner: air; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_rut_key UNIQUE (rut);


--
-- Name: carreras_escuela_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY carreras
    ADD CONSTRAINT carreras_escuela_fk_fkey FOREIGN KEY (escuela_fk) REFERENCES escuelas(pk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: contactos_empresariales_empresa_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY contactos_empresariales
    ADD CONSTRAINT contactos_empresariales_empresa_fk_fkey FOREIGN KEY (empresa_fk) REFERENCES empresas(pk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: departamentos_facultad_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT departamentos_facultad_fk_fkey FOREIGN KEY (facultad_fk) REFERENCES facultades(pk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: empresas_rubro_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY empresas
    ADD CONSTRAINT empresas_rubro_fk_fkey FOREIGN KEY (rubro_fk) REFERENCES rubros(pk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: escuelas_departamento_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY escuelas
    ADD CONSTRAINT escuelas_departamento_fk_fkey FOREIGN KEY (departamento_fk) REFERENCES departamentos(pk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiantes_carrera_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY estudiantes
    ADD CONSTRAINT estudiantes_carrera_fk_fkey FOREIGN KEY (carrera_fk) REFERENCES carreras(pk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: practicas_areas_tematica_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY practicas
    ADD CONSTRAINT practicas_areas_tematica_fk_fkey FOREIGN KEY (areas_tematica_fk) REFERENCES areas_tematicas(pk);


--
-- Name: practicas_carrera_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY practicas
    ADD CONSTRAINT practicas_carrera_fk_fkey FOREIGN KEY (carrera_fk) REFERENCES carreras(pk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: practicas_contacto_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY practicas
    ADD CONSTRAINT practicas_contacto_fk_fkey FOREIGN KEY (contacto_fk) REFERENCES contactos_empresariales(pk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: practicas_estudiante_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY practicas
    ADD CONSTRAINT practicas_estudiante_fk_fkey FOREIGN KEY (estudiante_fk) REFERENCES estudiantes(pk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: roles_usuarios_rol_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY roles_usuarios
    ADD CONSTRAINT roles_usuarios_rol_fk_fkey FOREIGN KEY (rol_fk) REFERENCES roles(pk) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: roles_usuarios_usuario_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: air
--

ALTER TABLE ONLY roles_usuarios
    ADD CONSTRAINT roles_usuarios_usuario_fk_fkey FOREIGN KEY (usuario_fk) REFERENCES usuarios(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: air
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM air;
GRANT ALL ON SCHEMA public TO air;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

