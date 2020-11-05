--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

-- Started on 2020-11-05 18:52:46

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE bdn_test;
--
-- TOC entry 2889 (class 1262 OID 16788)
-- Name: bdn_test; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE bdn_test WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_Indonesia.1252' LC_CTYPE = 'English_Indonesia.1252';


ALTER DATABASE bdn_test OWNER TO postgres;

\connect bdn_test

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 2890 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 632 (class 1247 OID 16851)
-- Name: jenis_transaksi; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.jenis_transaksi AS ENUM (
    'SUCCESS',
    'PENDING'
);


ALTER TYPE public.jenis_transaksi OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 17067)
-- Name: sequence_customer; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sequence_customer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sequence_customer OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 203 (class 1259 OID 16926)
-- Name: customer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customer (
    id_customer integer DEFAULT nextval('public.sequence_customer'::regclass) NOT NULL,
    name character varying(45),
    email character varying(45),
    phone character varying(15),
    password character varying(255)
);


ALTER TABLE public.customer OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 17064)
-- Name: sequence_item; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sequence_item
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sequence_item OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16918)
-- Name: item; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.item (
    id_item integer DEFAULT nextval('public.sequence_item'::regclass) NOT NULL,
    item_name character varying(45),
    item_description text,
    item_price integer
);


ALTER TABLE public.item OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 17070)
-- Name: sequence_channel; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sequence_channel
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sequence_channel OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16931)
-- Name: payment_channel; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.payment_channel (
    id_channel integer DEFAULT nextval('public.sequence_channel'::regclass) NOT NULL,
    code character varying(50),
    name character varying(50)
);


ALTER TABLE public.payment_channel OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 17076)
-- Name: sequence_fee; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sequence_fee
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sequence_fee OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 17021)
-- Name: payment_channel_provider_fee; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.payment_channel_provider_fee (
    id_fee integer DEFAULT nextval('public.sequence_fee'::regclass) NOT NULL,
    admin_fee integer,
    id_provider integer NOT NULL,
    id_channel integer NOT NULL
);


ALTER TABLE public.payment_channel_provider_fee OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 17073)
-- Name: sequence_provider; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sequence_provider
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sequence_provider OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16936)
-- Name: payment_provider; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.payment_provider (
    id_provider integer DEFAULT nextval('public.sequence_provider'::regclass) NOT NULL,
    code character varying(10),
    name character varying(50)
);


ALTER TABLE public.payment_provider OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 17079)
-- Name: sequence_transaksi; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sequence_transaksi
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sequence_transaksi OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 17036)
-- Name: transaksi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transaksi (
    id_transaksi integer DEFAULT nextval('public.sequence_transaksi'::regclass) NOT NULL,
    transaction_no character varying(45),
    status public.jenis_transaksi,
    item_qty integer,
    created_at timestamp without time zone,
    paid_at timestamp without time zone,
    expired_at timestamp without time zone,
    total_harga integer,
    id_item integer NOT NULL,
    id_customer integer NOT NULL,
    id_channel integer NOT NULL,
    id_provider integer NOT NULL,
    id_fee integer NOT NULL,
    jenis_transaksi character varying(50)
);


ALTER TABLE public.transaksi OWNER TO postgres;

--
-- TOC entry 2873 (class 0 OID 16926)
-- Dependencies: 203
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.customer (id_customer, name, email, phone, password) VALUES (1, 'Cahya Affrillah Prasetyo', 'cahya.affrillah@gmail.com', '1231218', 'cahya123');
INSERT INTO public.customer (id_customer, name, email, phone, password) VALUES (2, 'adit', 'admin@admin.com', '1', '1');
INSERT INTO public.customer (id_customer, name, email, phone, password) VALUES (3, 'rafi', 'rafi@gmail.com', '1', '1');
INSERT INTO public.customer (id_customer, name, email, phone, password) VALUES (4, 'nurul', 'nurul@gmail.com', '1', '1');
INSERT INTO public.customer (id_customer, name, email, phone, password) VALUES (5, 'kartini', 'kartini@gmail.com', '1', '1');


--
-- TOC entry 2872 (class 0 OID 16918)
-- Dependencies: 202
-- Data for Name: item; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.item (id_item, item_name, item_description, item_price) VALUES (1, 'test item', 'item percobaan', 10000);


--
-- TOC entry 2874 (class 0 OID 16931)
-- Dependencies: 204
-- Data for Name: payment_channel; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.payment_channel (id_channel, code, name) VALUES (2, 'GOPAY', 'Gojek Pay');
INSERT INTO public.payment_channel (id_channel, code, name) VALUES (3, 'BCA VA', 'BCA Virtual Account');
INSERT INTO public.payment_channel (id_channel, code, name) VALUES (4, 'BANK_TRANSFER', 'Bank Transfer');


--
-- TOC entry 2876 (class 0 OID 17021)
-- Dependencies: 206
-- Data for Name: payment_channel_provider_fee; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.payment_channel_provider_fee (id_fee, admin_fee, id_provider, id_channel) VALUES (2, 3000, 2, 2);
INSERT INTO public.payment_channel_provider_fee (id_fee, admin_fee, id_provider, id_channel) VALUES (3, 3500, 1, 2);
INSERT INTO public.payment_channel_provider_fee (id_fee, admin_fee, id_provider, id_channel) VALUES (4, 2000, 3, 3);
INSERT INTO public.payment_channel_provider_fee (id_fee, admin_fee, id_provider, id_channel) VALUES (1, 2000, 1, 3);
INSERT INTO public.payment_channel_provider_fee (id_fee, admin_fee, id_provider, id_channel) VALUES (5, 2500, 2, 3);


--
-- TOC entry 2875 (class 0 OID 16936)
-- Dependencies: 205
-- Data for Name: payment_provider; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.payment_provider (id_provider, code, name) VALUES (1, 'DOKU', 'DOKU');
INSERT INTO public.payment_provider (id_provider, code, name) VALUES (2, 'MIDTRANS', 'Midtrans');
INSERT INTO public.payment_provider (id_provider, code, name) VALUES (3, 'SPRINT', 'Sprint');


--
-- TOC entry 2877 (class 0 OID 17036)
-- Dependencies: 207
-- Data for Name: transaksi; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.transaksi (id_transaksi, transaction_no, status, item_qty, created_at, paid_at, expired_at, total_harga, id_item, id_customer, id_channel, id_provider, id_fee, jenis_transaksi) VALUES (4, '4', 'SUCCESS', 2, '2020-11-05 00:00:00', '2020-11-05 00:00:00', '2020-11-08 00:00:00', 20000, 1, 1, 3, 2, 5, 'cash');
INSERT INTO public.transaksi (id_transaksi, transaction_no, status, item_qty, created_at, paid_at, expired_at, total_harga, id_item, id_customer, id_channel, id_provider, id_fee, jenis_transaksi) VALUES (3, '3', 'SUCCESS', 3, '2020-11-04 00:00:00', '2020-11-05 00:00:00', '2020-11-08 00:00:00', 30000, 1, 1, 2, 2, 2, 'cash');
INSERT INTO public.transaksi (id_transaksi, transaction_no, status, item_qty, created_at, paid_at, expired_at, total_harga, id_item, id_customer, id_channel, id_provider, id_fee, jenis_transaksi) VALUES (1, '1', 'SUCCESS', 1, '2020-11-04 00:00:00', '2020-11-04 00:00:00', '2020-11-08 00:00:00', 10000, 1, 1, 2, 2, 2, 'debit');
INSERT INTO public.transaksi (id_transaksi, transaction_no, status, item_qty, created_at, paid_at, expired_at, total_harga, id_item, id_customer, id_channel, id_provider, id_fee, jenis_transaksi) VALUES (9, '7', 'SUCCESS', 1, '2020-11-05 00:00:00', '2020-11-05 00:00:00', '2020-11-08 00:00:00', 10000, 1, 3, 3, 1, 1, 'debit');
INSERT INTO public.transaksi (id_transaksi, transaction_no, status, item_qty, created_at, paid_at, expired_at, total_harga, id_item, id_customer, id_channel, id_provider, id_fee, jenis_transaksi) VALUES (6, '5', 'SUCCESS', 1, '2020-11-05 00:00:00', '2020-11-05 00:00:00', '2020-11-08 00:00:00', 10000, 1, 1, 3, 2, 5, 'debit');
INSERT INTO public.transaksi (id_transaksi, transaction_no, status, item_qty, created_at, paid_at, expired_at, total_harga, id_item, id_customer, id_channel, id_provider, id_fee, jenis_transaksi) VALUES (7, '6', 'SUCCESS', 1, '2020-11-05 00:00:00', '2020-11-05 00:00:00', '2020-11-08 00:00:00', 10000, 1, 2, 3, 2, 5, 'cash');
INSERT INTO public.transaksi (id_transaksi, transaction_no, status, item_qty, created_at, paid_at, expired_at, total_harga, id_item, id_customer, id_channel, id_provider, id_fee, jenis_transaksi) VALUES (10, '8', 'SUCCESS', 1, '2020-11-05 00:00:00', '2020-11-05 00:00:00', '2020-11-08 00:00:00', 10000, 1, 4, 3, 2, 5, 'debit');
INSERT INTO public.transaksi (id_transaksi, transaction_no, status, item_qty, created_at, paid_at, expired_at, total_harga, id_item, id_customer, id_channel, id_provider, id_fee, jenis_transaksi) VALUES (2, '2', 'SUCCESS', 3, '2020-11-05 00:00:00', '2020-11-05 00:00:00', '2020-11-08 00:00:00', 30000, 1, 1, 3, 3, 4, 'cash');


--
-- TOC entry 2891 (class 0 OID 0)
-- Dependencies: 210
-- Name: sequence_channel; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sequence_channel', 4, true);


--
-- TOC entry 2892 (class 0 OID 0)
-- Dependencies: 209
-- Name: sequence_customer; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sequence_customer', 5, true);


--
-- TOC entry 2893 (class 0 OID 0)
-- Dependencies: 212
-- Name: sequence_fee; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sequence_fee', 5, true);


--
-- TOC entry 2894 (class 0 OID 0)
-- Dependencies: 208
-- Name: sequence_item; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sequence_item', 1, true);


--
-- TOC entry 2895 (class 0 OID 0)
-- Dependencies: 211
-- Name: sequence_provider; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sequence_provider', 3, true);


--
-- TOC entry 2896 (class 0 OID 0)
-- Dependencies: 213
-- Name: sequence_transaksi; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sequence_transaksi', 10, true);


--
-- TOC entry 2730 (class 2606 OID 16930)
-- Name: customer customer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (id_customer);


--
-- TOC entry 2728 (class 2606 OID 16925)
-- Name: item item_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.item
    ADD CONSTRAINT item_pkey PRIMARY KEY (id_item);


--
-- TOC entry 2732 (class 2606 OID 16935)
-- Name: payment_channel payment_channel_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment_channel
    ADD CONSTRAINT payment_channel_pkey PRIMARY KEY (id_channel);


--
-- TOC entry 2736 (class 2606 OID 17025)
-- Name: payment_channel_provider_fee payment_channel_provider_fee_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment_channel_provider_fee
    ADD CONSTRAINT payment_channel_provider_fee_pkey PRIMARY KEY (id_fee);


--
-- TOC entry 2734 (class 2606 OID 16940)
-- Name: payment_provider payment_provider_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment_provider
    ADD CONSTRAINT payment_provider_pkey PRIMARY KEY (id_provider);


--
-- TOC entry 2738 (class 2606 OID 17083)
-- Name: transaksi transaksi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT transaksi_pkey PRIMARY KEY (id_transaksi);


--
-- TOC entry 2740 (class 2606 OID 17031)
-- Name: payment_channel_provider_fee fk_channel; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment_channel_provider_fee
    ADD CONSTRAINT fk_channel FOREIGN KEY (id_channel) REFERENCES public.payment_channel(id_channel) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2743 (class 2606 OID 17049)
-- Name: transaksi fk_channel; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT fk_channel FOREIGN KEY (id_channel) REFERENCES public.payment_channel(id_channel) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2742 (class 2606 OID 17044)
-- Name: transaksi fk_customer; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT fk_customer FOREIGN KEY (id_customer) REFERENCES public.customer(id_customer) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2745 (class 2606 OID 17059)
-- Name: transaksi fk_fee; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT fk_fee FOREIGN KEY (id_fee) REFERENCES public.payment_channel_provider_fee(id_fee) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2741 (class 2606 OID 17039)
-- Name: transaksi fk_item; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT fk_item FOREIGN KEY (id_item) REFERENCES public.item(id_item) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2739 (class 2606 OID 17026)
-- Name: payment_channel_provider_fee fk_provider; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment_channel_provider_fee
    ADD CONSTRAINT fk_provider FOREIGN KEY (id_provider) REFERENCES public.payment_provider(id_provider) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2744 (class 2606 OID 17054)
-- Name: transaksi fk_provider; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT fk_provider FOREIGN KEY (id_provider) REFERENCES public.payment_provider(id_provider) ON UPDATE CASCADE ON DELETE CASCADE;


-- Completed on 2020-11-05 18:52:47

--
-- PostgreSQL database dump complete
--

