-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/08/2025 às 02:08
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdcinefilms`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `email`, `mensagem`, `created_at`, `updated_at`) VALUES
(1, 'Gabriel', 'arr@gmail.com', 'dsadas', '2025-08-06 02:32:13', '2025-08-06 02:32:13'),
(2, 'Kauã', 'ka1234@gmail.com', 'FIcou bom', '2025-08-06 02:34:58', '2025-08-06 02:34:58'),
(3, 'GABRIEL DE ARRUDA SILVA', 'arr@gmail.com', 'bhbhb', '2025-08-08 03:21:29', '2025-08-08 03:21:29'),
(4, 'GABRIEL DE ARRUDA SILVA', 'arr@gmail.com', 'bhbhb', '2025-08-08 03:21:32', '2025-08-08 03:21:32'),
(5, 'GABRIEL DE ARRUDA SILVA', 'arr@gmail.com', 'OI', '2025-08-08 03:22:00', '2025-08-08 03:22:00'),
(6, 'Gabriel', 'gb1234@gmail.com', 'OI', '2025-08-08 03:22:21', '2025-08-08 03:22:21'),
(7, 'Gabriel', 'gb1234@gmail.com', 'OI', '2025-08-08 03:25:11', '2025-08-08 03:25:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `classificacao` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `genero`, `imagem`, `descricao`, `classificacao`, `created_at`, `updated_at`) VALUES
(1, 'invocação do mal 4', 'terror', 'filmes/KDZMDlS6iiJ4brTrlBM9FOoJSI2R1OyCxQZjCAZg.jpg', 'Batman', 18, '2025-08-25 00:59:07', '2025-08-25 00:59:07'),
(2, 'F1', 'Ação/Corrida', 'filmes/ZszG3Kf7dTTtaqGO2yxjQNB12j4F7OxCixNn0fMZ.jpg', 'Ferrari a melho!!', 13, '2025-08-25 01:13:43', '2025-08-25 01:13:43'),
(3, 'F1', 'Ação/Corrida', 'filmes/rw2iVfVEkB4L0mBnIWyqhneo3BvQ00qvTJwop0L7.jpg', 'Ferrari a melhor!!', 12, '2025-08-25 01:17:03', '2025-08-25 01:17:03'),
(4, 'F1', 'Ação/Corrida', 'filmes/g7kgwn0H03IGB8vNr5gmVgW8TAmFl97135FJ5KtT.jpg', 'DA', 13, '2025-08-25 01:34:29', '2025-08-25 01:34:29'),
(5, 'superman', 'Ação/Corrida', 'filmes/GhrtTY9tF37z3QV0jsWsnBSMbbQcQAaJyatUuMxo.jpg', 'DAS', 12, '2025-08-25 02:20:24', '2025-08-25 02:20:24'),
(6, 'superman', 'Ação/Corrida', 'filmes/kAAEsFD41gfZVpvMPoPmCyBm1uqIhLNCu5wgFbQn.jpg', '312', 12, '2025-08-25 02:25:27', '2025-08-25 02:25:27'),
(7, 'superman', 'terror', 'filmes/1Nf12VkfYCQrz4rYz5f8XlGL7jxl6PGzLo5yWWAw.jpg', 'dasd', 12, '2025-08-25 02:33:54', '2025-08-25 02:33:54'),
(8, 'superman', 'terror', 'filmes/67VXMpPRR4lZME3HRcKNgZsihUkLoeq4WWx7l2zw.jpg', 'ewqeq', 12, '2025-08-25 02:48:28', '2025-08-25 02:48:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_08_05_230342_create_contatos_table', 1),
(6, '2025_08_16_160931_create_users_table', 2),
(7, '2025_08_16_160633_create_usuario_table', 3),
(8, '2025_08_24_202922_create_filmes_table', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_gm` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_gm`, `created_at`, `updated_at`) VALUES
(1, 'Usuário Teste', 'usuario@teste.com', '$2y$10$NNnctJM47xUCRiOqb61ONuDGIkFQoI0p0MmMK.zn0Ck1Ul96nN8Xa', 0, '2025-08-16 20:03:06', '2025-08-16 20:03:06'),
(2, 'Admin GM', 'admin@teste.com', '$2y$10$UyNKB.WFaNEFI2q9y3b5VuUCwNg8dRVOagC8Vv0PHS0ub2OY6RL.2', 1, '2025-08-16 20:03:15', '2025-08-16 20:03:15'),
(9, 'Gabriel Arruda silva', 'arr@gmail.com', '$2y$10$cG8CJPiWQPe5WnMt0Qwmqe9DLrnqXUFxmZLzodXsf1HWGM7iJfYQG', 0, '2025-08-16 21:15:48', '2025-08-16 21:15:48'),
(10, 'Arruda 00', 'gb1234@gmail.com', '$2y$10$TIcAXd1gYF9vLbchjvp0i.UKZ4XMhQRj69DF6hyAqSXCrzWZRKUD6', 0, '2025-08-16 21:16:53', '2025-08-16 21:16:53'),
(11, 'Gabriel', 'gb@admin.com', '$2y$10$f.o9QNCdGqckEBXOxj3RAezlX/3Ss8/6wPShWNhMQfjvPi9UcVITO', 1, '2025-08-24 18:32:42', '2025-08-24 18:36:24');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
