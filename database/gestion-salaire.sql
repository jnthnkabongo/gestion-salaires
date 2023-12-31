PGDMP     3    9                {            gestion-salaire    14.8    14.8 `    y           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            z           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            {           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            |           1262    24886    gestion-salaire    DATABASE     \   CREATE DATABASE "gestion-salaire" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'C';
 !   DROP DATABASE "gestion-salaire";
                postgres    false            �            1259    57396    configurations    TABLE     �  CREATE TABLE public.configurations (
    id bigint NOT NULL,
    type character varying(255) DEFAULT 'ANOTHER'::character varying NOT NULL,
    value character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT configurations_type_check CHECK (((type)::text = ANY ((ARRAY['PAYMENT_DATE'::character varying, 'APP_NAME'::character varying, 'DEVELOPPER_NAME'::character varying, 'ANOTHER'::character varying])::text[])))
);
 "   DROP TABLE public.configurations;
       public         heap    postgres    false            }           0    0    COLUMN configurations.type    COMMENT     M   COMMENT ON COLUMN public.configurations.type IS 'La table de configuration';
          public          postgres    false    227            �            1259    57395    configurations_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.configurations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.configurations_id_seq;
       public          postgres    false    227            ~           0    0    configurations_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.configurations_id_seq OWNED BY public.configurations.id;
          public          postgres    false    226            �            1259    32846    departements    TABLE     �   CREATE TABLE public.departements (
    id bigint NOT NULL,
    nom_dep character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    responsable_dep character varying(255)
);
     DROP TABLE public.departements;
       public         heap    postgres    false            �            1259    32845    departements_id_seq    SEQUENCE     |   CREATE SEQUENCE public.departements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.departements_id_seq;
       public          postgres    false    221                       0    0    departements_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.departements_id_seq OWNED BY public.departements.id;
          public          postgres    false    220            �            1259    32853 	   employers    TABLE       CREATE TABLE public.employers (
    id bigint NOT NULL,
    nom character varying(255) NOT NULL,
    prenom character varying(255) NOT NULL,
    postnom character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    sexe character varying(255) NOT NULL,
    age character varying(255) NOT NULL,
    contact character varying(255) NOT NULL,
    montant_journalier integer,
    departement_id bigint NOT NULL,
    roles_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.employers;
       public         heap    postgres    false            �            1259    32852    employers_id_seq    SEQUENCE     �   CREATE SEQUENCE public.employers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.employers_id_seq;
       public          postgres    false    223            �           0    0    employers_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.employers_id_seq OWNED BY public.employers.id;
          public          postgres    false    222            �            1259    32822    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    32821    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    217            �           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    216            �            1259    32785 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    32784    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    210            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    209            �            1259    32814    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false            �            1259    57520    payments    TABLE     c  CREATE TABLE public.payments (
    id bigint NOT NULL,
    reference character varying(255),
    employers_id bigint NOT NULL,
    amount character varying(255) NOT NULL,
    month character varying(255) NOT NULL,
    years character varying(255) NOT NULL,
    validate_date timestamp(0) without time zone NOT NULL,
    date timestamp(0) without time zone NOT NULL,
    status character varying(255) DEFAULT 'SUCCESS'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT payments_month_check CHECK (((month)::text = ANY ((ARRAY['JANVIER'::character varying, 'FEVRIER'::character varying, 'MARS'::character varying, 'AVRIL'::character varying, 'MAI'::character varying, 'JUIN'::character varying, 'JUILLET'::character varying, 'AOUT'::character varying, 'SEPTEMBRE'::character varying, 'OCTOBRE'::character varying, 'NOVEMBRE'::character varying, 'DECEMBRE'::character varying])::text[]))),
    CONSTRAINT payments_status_check CHECK (((status)::text = ANY ((ARRAY['SUCCESS'::character varying, 'FAILED'::character varying])::text[])))
);
    DROP TABLE public.payments;
       public         heap    postgres    false            �            1259    57519    payments_id_seq    SEQUENCE     x   CREATE SEQUENCE public.payments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.payments_id_seq;
       public          postgres    false    231            �           0    0    payments_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.payments_id_seq OWNED BY public.payments.id;
          public          postgres    false    230            �            1259    32834    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    32833    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    219            �           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    218            �            1259    57497    reset_code_passwords    TABLE     �   CREATE TABLE public.reset_code_passwords (
    id bigint NOT NULL,
    code character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 (   DROP TABLE public.reset_code_passwords;
       public         heap    postgres    false            �            1259    57496    reset_code_passwords_id_seq    SEQUENCE     �   CREATE SEQUENCE public.reset_code_passwords_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.reset_code_passwords_id_seq;
       public          postgres    false    229            �           0    0    reset_code_passwords_id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.reset_code_passwords_id_seq OWNED BY public.reset_code_passwords.id;
          public          postgres    false    228            �            1259    32792    roles    TABLE     �   CREATE TABLE public.roles (
    id bigint NOT NULL,
    intitule character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.roles;
       public         heap    postgres    false            �            1259    32791    roles_id_seq    SEQUENCE     u   CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public          postgres    false    212            �           0    0    roles_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;
          public          postgres    false    211            �            1259    57384    salaires    TABLE     �   CREATE TABLE public.salaires (
    id_sal integer NOT NULL,
    employer_id bigint NOT NULL,
    montant integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.salaires;
       public         heap    postgres    false            �            1259    57383    salaires_id_sal_seq    SEQUENCE     �   CREATE SEQUENCE public.salaires_id_sal_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.salaires_id_sal_seq;
       public          postgres    false    225            �           0    0    salaires_id_sal_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.salaires_id_sal_seq OWNED BY public.salaires.id_sal;
          public          postgres    false    224            �            1259    32799    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    roles_id bigint,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    32798    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    214            �           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    213            �           2604    57399    configurations id    DEFAULT     v   ALTER TABLE ONLY public.configurations ALTER COLUMN id SET DEFAULT nextval('public.configurations_id_seq'::regclass);
 @   ALTER TABLE public.configurations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    226    227            �           2604    32849    departements id    DEFAULT     r   ALTER TABLE ONLY public.departements ALTER COLUMN id SET DEFAULT nextval('public.departements_id_seq'::regclass);
 >   ALTER TABLE public.departements ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220    221            �           2604    40976    employers id    DEFAULT     l   ALTER TABLE ONLY public.employers ALTER COLUMN id SET DEFAULT nextval('public.employers_id_seq'::regclass);
 ;   ALTER TABLE public.employers ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222    223            �           2604    32825    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    216    217            �           2604    32788    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209    210            �           2604    57523    payments id    DEFAULT     j   ALTER TABLE ONLY public.payments ALTER COLUMN id SET DEFAULT nextval('public.payments_id_seq'::regclass);
 :   ALTER TABLE public.payments ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    230    231    231            �           2604    32837    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    219    219            �           2604    57500    reset_code_passwords id    DEFAULT     �   ALTER TABLE ONLY public.reset_code_passwords ALTER COLUMN id SET DEFAULT nextval('public.reset_code_passwords_id_seq'::regclass);
 F   ALTER TABLE public.reset_code_passwords ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    229    229            �           2604    32795    roles id    DEFAULT     d   ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    212    212            �           2604    57387    salaires id_sal    DEFAULT     r   ALTER TABLE ONLY public.salaires ALTER COLUMN id_sal SET DEFAULT nextval('public.salaires_id_sal_seq'::regclass);
 >   ALTER TABLE public.salaires ALTER COLUMN id_sal DROP DEFAULT;
       public          postgres    false    225    224    225            �           2604    32802    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    214    214            r          0    57396    configurations 
   TABLE DATA           Q   COPY public.configurations (id, type, value, created_at, updated_at) FROM stdin;
    public          postgres    false    227   �x       l          0    32846    departements 
   TABLE DATA           \   COPY public.departements (id, nom_dep, created_at, updated_at, responsable_dep) FROM stdin;
    public          postgres    false    221   (y       n          0    32853 	   employers 
   TABLE DATA           �   COPY public.employers (id, nom, prenom, postnom, email, sexe, age, contact, montant_journalier, departement_id, roles_id, created_at, updated_at) FROM stdin;
    public          postgres    false    223   z       h          0    32822    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    217   ||       a          0    32785 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    210   �|       f          0    32814    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    215   �}       v          0    57520    payments 
   TABLE DATA           �   COPY public.payments (id, reference, employers_id, amount, month, years, validate_date, date, status, created_at, updated_at) FROM stdin;
    public          postgres    false    231   �}       j          0    32834    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    219   �~       t          0    57497    reset_code_passwords 
   TABLE DATA           W   COPY public.reset_code_passwords (id, code, email, created_at, updated_at) FROM stdin;
    public          postgres    false    229   �~       c          0    32792    roles 
   TABLE DATA           E   COPY public.roles (id, intitule, created_at, updated_at) FROM stdin;
    public          postgres    false    212   �       p          0    57384    salaires 
   TABLE DATA           X   COPY public.salaires (id_sal, employer_id, montant, created_at, updated_at) FROM stdin;
    public          postgres    false    225   �       e          0    32799    users 
   TABLE DATA              COPY public.users (id, name, email, email_verified_at, password, roles_id, remember_token, created_at, updated_at) FROM stdin;
    public          postgres    false    214   �       �           0    0    configurations_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.configurations_id_seq', 21, true);
          public          postgres    false    226            �           0    0    departements_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.departements_id_seq', 12, true);
          public          postgres    false    220            �           0    0    employers_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.employers_id_seq', 29, true);
          public          postgres    false    222            �           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    216            �           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 12, true);
          public          postgres    false    209            �           0    0    payments_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.payments_id_seq', 26, true);
          public          postgres    false    230            �           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    218            �           0    0    reset_code_passwords_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.reset_code_passwords_id_seq', 6, true);
          public          postgres    false    228            �           0    0    roles_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.roles_id_seq', 1, false);
          public          postgres    false    211            �           0    0    salaires_id_sal_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.salaires_id_sal_seq', 1, false);
          public          postgres    false    224            �           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 20, true);
          public          postgres    false    213            �           2606    57405 "   configurations configurations_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.configurations
    ADD CONSTRAINT configurations_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.configurations DROP CONSTRAINT configurations_pkey;
       public            postgres    false    227            �           2606    32851    departements departements_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.departements
    ADD CONSTRAINT departements_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.departements DROP CONSTRAINT departements_pkey;
       public            postgres    false    221            �           2606    32872     employers employers_email_unique 
   CONSTRAINT     \   ALTER TABLE ONLY public.employers
    ADD CONSTRAINT employers_email_unique UNIQUE (email);
 J   ALTER TABLE ONLY public.employers DROP CONSTRAINT employers_email_unique;
       public            postgres    false    223            �           2606    40978    employers employers_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.employers
    ADD CONSTRAINT employers_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.employers DROP CONSTRAINT employers_pkey;
       public            postgres    false    223            �           2606    32830    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    217            �           2606    32832 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    217            �           2606    32790    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    210            �           2606    32820 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    215            �           2606    57530    payments payments_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.payments DROP CONSTRAINT payments_pkey;
       public            postgres    false    231            �           2606    32841 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    219            �           2606    32844 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    219            �           2606    57506 6   reset_code_passwords reset_code_passwords_email_unique 
   CONSTRAINT     r   ALTER TABLE ONLY public.reset_code_passwords
    ADD CONSTRAINT reset_code_passwords_email_unique UNIQUE (email);
 `   ALTER TABLE ONLY public.reset_code_passwords DROP CONSTRAINT reset_code_passwords_email_unique;
       public            postgres    false    229            �           2606    57504 .   reset_code_passwords reset_code_passwords_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.reset_code_passwords
    ADD CONSTRAINT reset_code_passwords_pkey PRIMARY KEY (id);
 X   ALTER TABLE ONLY public.reset_code_passwords DROP CONSTRAINT reset_code_passwords_pkey;
       public            postgres    false    229            �           2606    32797    roles roles_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_pkey;
       public            postgres    false    212            �           2606    57389    salaires salaires_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.salaires
    ADD CONSTRAINT salaires_pkey PRIMARY KEY (id_sal);
 @   ALTER TABLE ONLY public.salaires DROP CONSTRAINT salaires_pkey;
       public            postgres    false    225            �           2606    32813    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    214            �           2606    32806    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    214            �           1259    32842 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    219    219            �           2606    32861 *   employers employers_departement_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.employers
    ADD CONSTRAINT employers_departement_id_foreign FOREIGN KEY (departement_id) REFERENCES public.departements(id);
 T   ALTER TABLE ONLY public.employers DROP CONSTRAINT employers_departement_id_foreign;
       public          postgres    false    223    3521    221            �           2606    32866 $   employers employers_roles_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.employers
    ADD CONSTRAINT employers_roles_id_foreign FOREIGN KEY (roles_id) REFERENCES public.roles(id);
 N   ALTER TABLE ONLY public.employers DROP CONSTRAINT employers_roles_id_foreign;
       public          postgres    false    212    3504    223            �           2606    57531 %   payments payments_employer_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_employer_id_foreign FOREIGN KEY (employers_id) REFERENCES public.employers(id);
 O   ALTER TABLE ONLY public.payments DROP CONSTRAINT payments_employer_id_foreign;
       public          postgres    false    223    231    3525            �           2606    57390 %   salaires salaires_employer_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.salaires
    ADD CONSTRAINT salaires_employer_id_foreign FOREIGN KEY (employer_id) REFERENCES public.employers(id);
 O   ALTER TABLE ONLY public.salaires DROP CONSTRAINT salaires_employer_id_foreign;
       public          postgres    false    3525    225    223            �           2606    32807    users users_roles_id_foreign    FK CONSTRAINT     |   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_roles_id_foreign FOREIGN KEY (roles_id) REFERENCES public.roles(id);
 F   ALTER TABLE ONLY public.users DROP CONSTRAINT users_roles_id_foreign;
       public          postgres    false    214    3504    212            r   |   x���t���p��I-VH���I-�4202�5��5�T00�26�20�&�eh�������骛��W	Wfd�`hnejnel�M��Ȑ3�1���/$��1ĕf�������������161�=... ��&�      l   �   x�m��N� ���}����͘h<���^�e[b:R�_\cڬ\�|��3#�c<'Zl�g @��oA4B��C��9��d?3�.������EB�W�����.-��+�)^�Z tU�0'
��=�����b�+Z j@9T����=Yz�9�����ے�4���6��ݒ��R	��z4��(��҉Kɒ�6nR��P	4��.6��_&D��V^�;t���7o8��L�r�      n   M  x�u�Mo�0���_�}��v���ti)]�B�z1%�Y�!5́�6_�K*��y�<�3�)<���l/�O|;O'sHYr��d6��7�$��F��	�"�(�90���5�ȇ42>@����{g-P�i��"
��5�ǳy��MYa�����P�O ��%����et͓�0���/�8_dw���S�*Å���(d ��(�\�Ԓ�Ga�Q$ً5C/�Ԃ�Y:��1]>�Ǧ..�	0j��;�Z:C��$�z�B�� �����L�1�)�����ؙݩ��T�(GoMu���JJ���h��T�H٧��5ժ���g^����]�*���CGWԽ�P�^������uQ��m�^�\ٝJŹ3(!��ME=$���ӈM�k����Ӽ�^�cνC� F֧�Pv[;�����*;����>H�@��2�= ��ʏӈm|eڢ.`U������G�r3��i`��ӈ�o�u�f�|�<���H��{��B�4�!����x�ȿ�ٚUs�/xvIH����������ܟ�c}�踗�M��un�Bw*��1�F����*���ȭ%�`di�F^G���pNI      h      x������ � �      a   �   x�]�ˎ� E��cFؐ���H%�(34D@U��$ͫ,X�#�^�%(���*-�&�f�<'����'PH$9�|$�;�� ��Ѧ���ȉ3����.�IlI64�'�f{����W>�ۜ�O�'���9�.&.�kB�jlW�����w�ΛO^��������=�J*�����}�:E�73,+��
�0���G���A�MA(����6��B�7��J ���m��*)wyk��%���ŧ�      f      x������ � �      v     x���Mr� ���)r�t� ;xI�[�66xr�s�v[��+6Z�y��B���#,~�1�E,����F��o�2ue���d�R�CmvUe����%��q�Ե�P�`<;��ՙm�|�P�t�V��zi^ ~2O�����}��1��
D��ݫ�R��ROc��|_g������|�H$e�a䫚+Uɤ{[�k7>t��(�'�97k��+�T��s�`�z3>�n��UY"+�:Ԏ�'�,��V���n;�:e�K|DT�8�������#˲obF�      j      x������ � �      t   �   x�}�;�0@g8E/�C��)�bu��q]�So���V���	p J~�O]�%ߞ�`b�(NB'&S6=���ߍq��1`�� ���(�. >--�~�{�Q�1T��"��+���~��z`	��n� g���7��7z�Y�      c   B   x�3�LL����,.)J,I--�4202�50�52P00�25�2��&�e�Y��\�Z��Y�J��=... ��9      p      x������ � �      e     x���˒�0�5<E/܊I \\5(06r�.�DT�" ���X���3���MN�_�|��HLJ�<�9���!?������&���0�v ��?j�3�0��#���a*�=>o�<�J'��d,�Z�7+Roe��'�1��	 ��.o@�c�G
-cef��"	��d�a@̜�#���Bu��1!��S���j���fTxg�T��m��f���A3����+V��|u�]�!��)�2���
��m�ԓ�L�M��$��7doφB/]��[E�o1R�b�P!�/-c�������?�������}��I���"�]���?\��4��ntC�'�����P~����Lq,�^Toڑ�f��y�'�A;���PS
�R���.�����l+��y���@�e,T^>�c��]��V�%s�Z9S���jc#�{F��q��3���"�x)���d�K���<`Z�"�<H�`5[�5$�8N�������Atr�@�j�0p�l�j#QTS�m�
���3c?9�eoS/-     