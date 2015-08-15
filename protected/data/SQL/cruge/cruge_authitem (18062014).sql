-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2014 a las 19:07:04
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `via-college`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitem`
--

CREATE TABLE IF NOT EXISTS `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitem`
--

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('', 0, '', NULL, 'N;'),
('*', 0, '', NULL, 'N;'),
('action_categoriesmajors_admin', 0, '', NULL, 'N;'),
('action_categoriesmajors_create', 0, '', NULL, 'N;'),
('action_categoriesmajors_delete', 0, '', NULL, 'N;'),
('action_categoriesmajors_index', 0, '', NULL, 'N;'),
('action_categoriesmajors_update', 0, '', NULL, 'N;'),
('action_categoriesmajors_view', 0, '', NULL, 'N;'),
('action_colleges_admin', 0, '', NULL, 'N;'),
('action_colleges_create', 0, '', NULL, 'N;'),
('action_colleges_delete', 0, '', NULL, 'N;'),
('action_colleges_index', 0, '', NULL, 'N;'),
('action_colleges_update', 0, '', NULL, 'N;'),
('action_colleges_view', 0, '', NULL, 'N;'),
('action_essaystudents_index', 0, '', NULL, 'N;'),
('action_essaystudents_write', 0, '', NULL, 'N;'),
('action_essays_admin', 0, '', NULL, 'N;'),
('action_essays_buscarstudents', 0, '', '', 'N;'),
('action_essays_cargarmajor', 0, '', NULL, 'N;'),
('action_essays_create', 0, '', NULL, 'N;'),
('action_essays_delete', 0, '', NULL, 'N;'),
('action_essays_index', 0, '', NULL, 'N;'),
('action_essays_list', 0, '', NULL, 'N;'),
('action_essays_update', 0, '', NULL, 'N;'),
('action_essays_view', 0, '', NULL, 'N;'),
('action_majors_admin', 0, '', NULL, 'N;'),
('action_majors_create', 0, '', NULL, 'N;'),
('action_majors_delete', 0, '', NULL, 'N;'),
('action_majors_index', 0, '', NULL, 'N;'),
('action_majors_update', 0, '', NULL, 'N;'),
('action_majors_view', 0, '', NULL, 'N;'),
('action_questionnairesmedicalfields_admin', 0, '', NULL, 'N;'),
('action_questionnairesmedicalfields_create', 0, '', NULL, 'N;'),
('action_questionnairesmedicalfields_delete', 0, '', NULL, 'N;'),
('action_questionnairesmedicalfields_index', 0, '', NULL, 'N;'),
('action_questionnairesmedicalfields_update', 0, '', NULL, 'N;'),
('action_questionnairesmedicalfields_view', 0, '', NULL, 'N;'),
('action_questionnairesparentsfields_admin', 0, '', NULL, 'N;'),
('action_questionnairesparentsfields_create', 0, '', NULL, 'N;'),
('action_questionnairesparentsfields_delete', 0, '', NULL, 'N;'),
('action_questionnairesparentsfields_index', 0, '', NULL, 'N;'),
('action_questionnairesparentsfields_update', 0, '', NULL, 'N;'),
('action_questionnairesparentsfields_view', 0, '', NULL, 'N;'),
('action_questionnairesstudentsfields_admin', 0, '', NULL, 'N;'),
('action_questionnairesstudentsfields_create', 0, '', NULL, 'N;'),
('action_questionnairesstudentsfields_delete', 0, '', NULL, 'N;'),
('action_questionnairesstudentsfields_index', 0, '', NULL, 'N;'),
('action_questionnairesstudentsfields_update', 0, '', NULL, 'N;'),
('action_questionnairesstudentsfields_view', 0, '', NULL, 'N;'),
('action_questionnaires_admin', 0, '', NULL, 'N;'),
('action_questionnaires_create', 0, '', NULL, 'N;'),
('action_questionnaires_delete', 0, '', NULL, 'N;'),
('action_questionnaires_index', 0, '', NULL, 'N;'),
('action_questionnaires_update', 0, '', NULL, 'N;'),
('action_questionnaires_view', 0, '', NULL, 'N;'),
('action_registrate_registrate', 0, '', NULL, 'N;'),
('action_requirements_admin', 0, '', NULL, 'N;'),
('action_requirements_assign', 0, '', NULL, 'N;'),
('action_requirements_create', 0, '', NULL, 'N;'),
('action_requirements_delete', 0, '', NULL, 'N;'),
('action_requirements_index', 0, '', NULL, 'N;'),
('action_requirements_load', 0, '', NULL, 'N;'),
('action_requirements_update', 0, '', NULL, 'N;'),
('action_requirements_upload', 0, '', NULL, 'N;'),
('action_requirements_view', 0, '', NULL, 'N;'),
('action_site_contact', 0, '', NULL, 'N;'),
('action_site_error', 0, '', NULL, 'N;'),
('action_site_index', 0, '', NULL, 'N;'),
('action_site_login', 0, '', NULL, 'N;'),
('action_site_logout', 0, '', NULL, 'N;'),
('action_state_admin', 0, '', NULL, 'N;'),
('action_state_create', 0, '', NULL, 'N;'),
('action_state_delete', 0, '', NULL, 'N;'),
('action_state_index', 0, '', NULL, 'N;'),
('action_state_update', 0, '', NULL, 'N;'),
('action_state_view', 0, '', NULL, 'N;'),
('action_students_admin', 0, '', NULL, 'N;'),
('action_students_create', 0, '', NULL, 'N;'),
('action_students_delete', 0, '', NULL, 'N;'),
('action_students_index', 0, '', NULL, 'N;'),
('action_students_update', 0, '', NULL, 'N;'),
('action_students_view', 0, '', NULL, 'N;'),
('action_tutorstudents_index', 0, '', NULL, 'N;'),
('action_tutor_admin', 0, '', NULL, 'N;'),
('action_tutor_buscarstudents', 0, '', '', 'N;'),
('action_tutor_create', 0, '', NULL, 'N;'),
('action_tutor_delete', 0, '', NULL, 'N;'),
('action_tutor_index', 0, '', NULL, 'N;'),
('action_tutor_update', 0, '', NULL, 'N;'),
('action_tutor_view', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_fieldsadmincreate', 0, '', NULL, 'N;'),
('action_ui_fieldsadmindelete', 0, '', NULL, 'N;'),
('action_ui_fieldsadminlist', 0, '', NULL, 'N;'),
('action_ui_fieldsadminupdate', 0, '', NULL, 'N;'),
('action_ui_rbacajaxassignment', 0, '', NULL, 'N;'),
('action_ui_rbacajaxsetchilditem', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemchilditems', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemcreate', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemdelete', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemupdate', 0, '', NULL, 'N;'),
('action_ui_rbaclistops', 0, '', NULL, 'N;'),
('action_ui_rbaclistroles', 0, '', NULL, 'N;'),
('action_ui_rbaclisttasks', 0, '', NULL, 'N;'),
('action_ui_rbacusersassignments', 0, '', NULL, 'N;'),
('action_ui_sessionadmin', 0, '', NULL, 'N;'),
('action_ui_systemupdate', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreate', 0, '', NULL, 'N;'),
('action_ui_usermanagementdelete', 0, '', NULL, 'N;'),
('action_ui_usermanagementupdate', 0, '', NULL, 'N;'),
('action_users_registrate', 0, '', NULL, 'N;'),
('action_users_welcome', 0, '', NULL, 'N;'),
('action_zones_admin', 0, '', NULL, 'N;'),
('action_zones_create', 0, '', NULL, 'N;'),
('action_zones_delete', 0, '', NULL, 'N;'),
('action_zones_index', 0, '', NULL, 'N;'),
('action_zones_update', 0, '', NULL, 'N;'),
('action_zones_view', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('Aliado', 2, '', '', 'N;'),
('Analista_I', 2, '', '', 'N;'),
('Analistda_I', 0, '', NULL, 'N;'),
('College', 2, 'Administrador Via college', '', 'N;'),
('ColSlege', 0, '', NULL, 'N;'),
('controller_registrate', 0, '', NULL, 'N;'),
('controller_requirements', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('createPostOperation', 0, '', NULL, 'N;'),
('default', 0, '', NULL, 'N;'),
('edit-advanced-profile-features', 0, 'D:\\htdocs\\via-college\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', NULL, 'N;'),
('Estudiante', 2, '', '', 'N;'),
('invitado', 0, '', NULL, 'N;'),
('Padre', 2, '', '', 'N;'),
('Psicologo', 2, '', '', 'N;'),
('Students', 0, '', NULL, 'N;'),
('Tutor', 2, '', '', 'N;'),
('venta', 0, '', NULL, 'N;');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
