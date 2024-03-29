PGDMP      8                |            gym_database2    16.2    16.2 9    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16422    gym_database2    DATABASE     �   CREATE DATABASE gym_database2 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_India.1252';
    DROP DATABASE gym_database2;
                postgres    false            �            1259    16497    address    TABLE     �   CREATE TABLE public.address (
    aid integer NOT NULL,
    street character varying(255) NOT NULL,
    state character varying(50) NOT NULL,
    city character varying(20) NOT NULL,
    pin character varying(20),
    uid character varying(20)
);
    DROP TABLE public.address;
       public         heap    postgres    false            �            1259    16496    address_aid_seq    SEQUENCE     �   CREATE SEQUENCE public.address_aid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.address_aid_seq;
       public          postgres    false    224            �           0    0    address_aid_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.address_aid_seq OWNED BY public.address.aid;
          public          postgres    false    223            �            1259    16433    admin    TABLE       CREATE TABLE public.admin (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    hashed_password character varying(255) NOT NULL,
    mob character varying(12),
    name character varying(255)
);
    DROP TABLE public.admin;
       public         heap    postgres    false            �            1259    24727 	   admin_img    TABLE     a   CREATE TABLE public.admin_img (
    id integer,
    image_url character varying(255) NOT NULL
);
    DROP TABLE public.admin_img;
       public         heap    postgres    false            �            1259    16468    enroll    TABLE     �   CREATE TABLE public.enroll (
    eid integer NOT NULL,
    userid character varying(20),
    pid character varying(20),
    paid_date character varying(30),
    expiry_date character varying(30),
    renew character varying(10)
);
    DROP TABLE public.enroll;
       public         heap    postgres    false            �            1259    16467    enroll_eid_seq    SEQUENCE     �   CREATE SEQUENCE public.enroll_eid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.enroll_eid_seq;
       public          postgres    false    220            �           0    0    enroll_eid_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.enroll_eid_seq OWNED BY public.enroll.eid;
          public          postgres    false    219            �            1259    16485    health_stat    TABLE       CREATE TABLE public.health_stat (
    hid integer NOT NULL,
    bmi character varying(20),
    height character varying(20),
    weight character varying(20),
    fat character varying(20),
    remarks character varying(255),
    uid character varying(20)
);
    DROP TABLE public.health_stat;
       public         heap    postgres    false            �            1259    16484    health_stat_hid_seq    SEQUENCE     �   CREATE SEQUENCE public.health_stat_hid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.health_stat_hid_seq;
       public          postgres    false    222            �           0    0    health_stat_hid_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.health_stat_hid_seq OWNED BY public.health_stat.hid;
          public          postgres    false    221            �            1259    24635    pay_hist    TABLE     �   CREATE TABLE public.pay_hist (
    srno integer NOT NULL,
    payid character varying NOT NULL,
    name character varying(100),
    userid character varying,
    pid character varying,
    amount character varying(30),
    pdate character varying(40)
);
    DROP TABLE public.pay_hist;
       public         heap    postgres    false            �            1259    24634    pay_hist_srno_seq    SEQUENCE     �   CREATE SEQUENCE public.pay_hist_srno_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.pay_hist_srno_seq;
       public          postgres    false    226            �           0    0    pay_hist_srno_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.pay_hist_srno_seq OWNED BY public.pay_hist.srno;
          public          postgres    false    225            �            1259    16448    plan    TABLE     �   CREATE TABLE public.plan (
    pid character varying(20) NOT NULL,
    pname character varying(20) NOT NULL,
    description character varying(255) NOT NULL,
    validity integer NOT NULL,
    amount integer NOT NULL,
    status character varying(20)
);
    DROP TABLE public.plan;
       public         heap    postgres    false            �            1259    16441    users    TABLE     G  CREATE TABLE public.users (
    userid character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    gender character varying(20) NOT NULL,
    mobile character varying(20) NOT NULL,
    email character varying(255) NOT NULL,
    dob character varying(20) NOT NULL,
    jdate character varying(20) NOT NULL
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    16432    users_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    216                        0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.admin.id;
          public          postgres    false    215            �            1259    24753 	   users_img    TABLE     c   CREATE TABLE public.users_img (
    uid character varying,
    image_url character varying(255)
);
    DROP TABLE public.users_img;
       public         heap    postgres    false            A           2604    16500    address aid    DEFAULT     j   ALTER TABLE ONLY public.address ALTER COLUMN aid SET DEFAULT nextval('public.address_aid_seq'::regclass);
 :   ALTER TABLE public.address ALTER COLUMN aid DROP DEFAULT;
       public          postgres    false    224    223    224            >           2604    16436    admin id    DEFAULT     d   ALTER TABLE ONLY public.admin ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.admin ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    216    216            ?           2604    16471 
   enroll eid    DEFAULT     h   ALTER TABLE ONLY public.enroll ALTER COLUMN eid SET DEFAULT nextval('public.enroll_eid_seq'::regclass);
 9   ALTER TABLE public.enroll ALTER COLUMN eid DROP DEFAULT;
       public          postgres    false    220    219    220            @           2604    16488    health_stat hid    DEFAULT     r   ALTER TABLE ONLY public.health_stat ALTER COLUMN hid SET DEFAULT nextval('public.health_stat_hid_seq'::regclass);
 >   ALTER TABLE public.health_stat ALTER COLUMN hid DROP DEFAULT;
       public          postgres    false    222    221    222            B           2604    24638    pay_hist srno    DEFAULT     n   ALTER TABLE ONLY public.pay_hist ALTER COLUMN srno SET DEFAULT nextval('public.pay_hist_srno_seq'::regclass);
 <   ALTER TABLE public.pay_hist ALTER COLUMN srno DROP DEFAULT;
       public          postgres    false    225    226    226            �          0    16497    address 
   TABLE DATA           E   COPY public.address (aid, street, state, city, pin, uid) FROM stdin;
    public          postgres    false    224   A       �          0    16433    admin 
   TABLE DATA           P   COPY public.admin (id, username, email, hashed_password, mob, name) FROM stdin;
    public          postgres    false    216   �A       �          0    24727 	   admin_img 
   TABLE DATA           2   COPY public.admin_img (id, image_url) FROM stdin;
    public          postgres    false    227   �B       �          0    16468    enroll 
   TABLE DATA           Q   COPY public.enroll (eid, userid, pid, paid_date, expiry_date, renew) FROM stdin;
    public          postgres    false    220   �B       �          0    16485    health_stat 
   TABLE DATA           R   COPY public.health_stat (hid, bmi, height, weight, fat, remarks, uid) FROM stdin;
    public          postgres    false    222   BC       �          0    24635    pay_hist 
   TABLE DATA           Q   COPY public.pay_hist (srno, payid, name, userid, pid, amount, pdate) FROM stdin;
    public          postgres    false    226   �C       �          0    16448    plan 
   TABLE DATA           Q   COPY public.plan (pid, pname, description, validity, amount, status) FROM stdin;
    public          postgres    false    218   �D       �          0    16441    users 
   TABLE DATA           P   COPY public.users (userid, name, gender, mobile, email, dob, jdate) FROM stdin;
    public          postgres    false    217   �E       �          0    24753 	   users_img 
   TABLE DATA           3   COPY public.users_img (uid, image_url) FROM stdin;
    public          postgres    false    228   �F                  0    0    address_aid_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.address_aid_seq', 14, true);
          public          postgres    false    223                       0    0    enroll_eid_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.enroll_eid_seq', 14, true);
          public          postgres    false    219                       0    0    health_stat_hid_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.health_stat_hid_seq', 15, true);
          public          postgres    false    221                       0    0    pay_hist_srno_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.pay_hist_srno_seq', 13, true);
          public          postgres    false    225                       0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 7, true);
          public          postgres    false    215            N           2606    16502    address address_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_pkey PRIMARY KEY (aid);
 >   ALTER TABLE ONLY public.address DROP CONSTRAINT address_pkey;
       public            postgres    false    224            J           2606    16473    enroll enroll_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.enroll
    ADD CONSTRAINT enroll_pkey PRIMARY KEY (eid);
 <   ALTER TABLE ONLY public.enroll DROP CONSTRAINT enroll_pkey;
       public            postgres    false    220            L           2606    16490    health_stat health_stat_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.health_stat
    ADD CONSTRAINT health_stat_pkey PRIMARY KEY (hid);
 F   ALTER TABLE ONLY public.health_stat DROP CONSTRAINT health_stat_pkey;
       public            postgres    false    222            P           2606    24642    pay_hist pay_hist_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.pay_hist
    ADD CONSTRAINT pay_hist_pkey PRIMARY KEY (payid);
 @   ALTER TABLE ONLY public.pay_hist DROP CONSTRAINT pay_hist_pkey;
       public            postgres    false    226            H           2606    16452    plan plan_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY public.plan
    ADD CONSTRAINT plan_pkey PRIMARY KEY (pid);
 8   ALTER TABLE ONLY public.plan DROP CONSTRAINT plan_pkey;
       public            postgres    false    218            D           2606    16440    admin users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.admin
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.admin DROP CONSTRAINT users_pkey;
       public            postgres    false    216            F           2606    16447    users users_pkey1 
   CONSTRAINT     S   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey1 PRIMARY KEY (userid);
 ;   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey1;
       public            postgres    false    217            T           2606    24589    address address_uid_fkey    FK CONSTRAINT     w   ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_uid_fkey FOREIGN KEY (uid) REFERENCES public.users(userid);
 B   ALTER TABLE ONLY public.address DROP CONSTRAINT address_uid_fkey;
       public          postgres    false    224    4678    217            W           2606    24732    admin_img admin_img_id_fkey    FK CONSTRAINT     u   ALTER TABLE ONLY public.admin_img
    ADD CONSTRAINT admin_img_id_fkey FOREIGN KEY (id) REFERENCES public.admin(id);
 E   ALTER TABLE ONLY public.admin_img DROP CONSTRAINT admin_img_id_fkey;
       public          postgres    false    227    4676    216            Q           2606    16479    enroll enroll_pid_fkey    FK CONSTRAINT     q   ALTER TABLE ONLY public.enroll
    ADD CONSTRAINT enroll_pid_fkey FOREIGN KEY (pid) REFERENCES public.plan(pid);
 @   ALTER TABLE ONLY public.enroll DROP CONSTRAINT enroll_pid_fkey;
       public          postgres    false    220    218    4680            R           2606    16474    enroll enroll_userid_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY public.enroll
    ADD CONSTRAINT enroll_userid_fkey FOREIGN KEY (userid) REFERENCES public.users(userid);
 C   ALTER TABLE ONLY public.enroll DROP CONSTRAINT enroll_userid_fkey;
       public          postgres    false    4678    217    220            S           2606    16491     health_stat health_stat_uid_fkey    FK CONSTRAINT        ALTER TABLE ONLY public.health_stat
    ADD CONSTRAINT health_stat_uid_fkey FOREIGN KEY (uid) REFERENCES public.users(userid);
 J   ALTER TABLE ONLY public.health_stat DROP CONSTRAINT health_stat_uid_fkey;
       public          postgres    false    217    4678    222            U           2606    24648    pay_hist pay_hist_pid_fkey    FK CONSTRAINT     u   ALTER TABLE ONLY public.pay_hist
    ADD CONSTRAINT pay_hist_pid_fkey FOREIGN KEY (pid) REFERENCES public.plan(pid);
 D   ALTER TABLE ONLY public.pay_hist DROP CONSTRAINT pay_hist_pid_fkey;
       public          postgres    false    226    218    4680            V           2606    24643    pay_hist pay_hist_userid_fkey    FK CONSTRAINT        ALTER TABLE ONLY public.pay_hist
    ADD CONSTRAINT pay_hist_userid_fkey FOREIGN KEY (userid) REFERENCES public.users(userid);
 G   ALTER TABLE ONLY public.pay_hist DROP CONSTRAINT pay_hist_userid_fkey;
       public          postgres    false    226    4678    217            X           2606    24758    users_img users_img_uid_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY public.users_img
    ADD CONSTRAINT users_img_uid_fkey FOREIGN KEY (uid) REFERENCES public.users(userid);
 F   ALTER TABLE ONLY public.users_img DROP CONSTRAINT users_img_uid_fkey;
       public          postgres    false    228    217    4678            �   �   x�3�(ͫL�T��,O,V�Qp�MJM�N,R�KL�>�y�
y�
�
F@I������D�Ҕ��l� Ps*P�����Ă����1�1�#$ȑ3 �ϕ*nhnhhdhhfa�eNG�̍M���d���������	�<hlidj`����� �m|      �   �   x�u��r�0 E��+X��$�`vUG)�HЪ�mU��
���a�Ew�lι(��ıjj!	�'�z��"���<�d����W(�r�n�\{�nF)��]�$o�W�G~�������Ĕa�ޯϿ2Q�t���Y#ŕ1��<U@G�X�#�\���B��M뒫MJ��3/hKVa���9`�vY&������4�.�Tk      �   $   x�3���u75w5w��*H�2q-�� �=... ��2      �   s   x�]�1�0F�ٹ��ۉ����T�g��o$T���^P��L���+���+-�%X@�W�a�y�+#3#���o�Ӳ]��imd�f����Y���V������Rz�@#      �   a   x�U���0�*���~��B��_�F$�&i'"�{(���ھ\w;�ޡY}�%�I�G�8t``���jQ���������T(��|M8      �     x����N�@���� ���Ο�n��zڄ����0,Ƅdc|{�� x ޛ_���� @L1�'�.u-�o-�M^�z�ZD�h��t.��$ !A�t�>S❿&�r������k5I�K��E��5��o�*-Η��ic��B$�AޗJ�$�HU��+0A�[�׍^;+妟*�2��j_Y�I��o�.���#Hz4�/ �+���;��!,�P1{p��pN����f-Z�������t)�%r�O��C%��G�ג�^�,��K��      �   �   x����J�@���)��d��Z��� � /��$�����-R�U���a�?����C���>�8:���Y|�d-ǈ���n�%+NT8"X�2X��`��ydUΜU�C��(�(`}�^�{(�@�g@�uSsy[%l�v�x�I��N)����=�S*��s+���8�p�%>��&$�`#�h�>Y`�`�;��dY���6      �   �   x����J�@E��_��P�N?v
3�![7�4�8i����כi�Q�MQ��9�K�H"w(�5�<���^_5/p�&�'�}\/h>�â����j��q�yx���m�Ҳ;{�t&r����J�f��u��H8�1����� ��X�����N|/z�CJ�߆��"���\UT�?9Z0ڰ� ׵����mUP A��G����ز�����c>��lR      �   T   x�=�1� ����K+e1���'�?	&������ðn�g��]�qZ00���6+Z��t��E?�I,2w/U���;"z ��&     