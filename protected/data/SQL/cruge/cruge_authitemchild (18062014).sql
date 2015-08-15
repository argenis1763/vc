-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2014 a las 19:07:19
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
-- Estructura de tabla para la tabla `cruge_authitemchild`
--

CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitemchild`
--

INSERT INTO `cruge_authitemchild` (`parent`, `child`) VALUES
('College', '*'),
('College', 'action_categoriesmajors_admin'),
('College', 'action_categoriesmajors_create'),
('College', 'action_categoriesmajors_delete'),
('College', 'action_categoriesmajors_index'),
('College', 'action_categoriesmajors_update'),
('College', 'action_categoriesmajors_view'),
('Analista_I', 'action_colleges_admin'),
('College', 'action_colleges_admin'),
('Analista_I', 'action_colleges_create'),
('College', 'action_colleges_create'),
('College', 'action_colleges_delete'),
('Aliado', 'action_colleges_index'),
('Analista_I', 'action_colleges_index'),
('College', 'action_colleges_index'),
('Estudiante', 'action_colleges_index'),
('Analista_I', 'action_colleges_update'),
('College', 'action_colleges_update'),
('Aliado', 'action_colleges_view'),
('Analista_I', 'action_colleges_view'),
('College', 'action_colleges_view'),
('Estudiante', 'action_colleges_view'),
('Analista_I', 'action_majors_admin'),
('College', 'action_majors_admin'),
('Analista_I', 'action_majors_create'),
('College', 'action_majors_create'),
('College', 'action_majors_delete'),
('Aliado', 'action_majors_index'),
('Analista_I', 'action_majors_index'),
('College', 'action_majors_index'),
('Estudiante', 'action_majors_index'),
('Analista_I', 'action_majors_update'),
('College', 'action_majors_update'),
('Aliado', 'action_majors_view'),
('Analista_I', 'action_majors_view'),
('College', 'action_majors_view'),
('Estudiante', 'action_majors_view'),
('College', 'action_questionnairesmedicalfields_admin'),
('Estudiante', 'action_questionnairesmedicalfields_admin'),
('College', 'action_questionnairesmedicalfields_create'),
('Estudiante', 'action_questionnairesmedicalfields_create'),
('College', 'action_questionnairesmedicalfields_delete'),
('College', 'action_questionnairesmedicalfields_index'),
('Estudiante', 'action_questionnairesmedicalfields_index'),
('College', 'action_questionnairesmedicalfields_update'),
('Estudiante', 'action_questionnairesmedicalfields_update'),
('College', 'action_questionnairesmedicalfields_view'),
('Estudiante', 'action_questionnairesmedicalfields_view'),
('College', 'action_questionnairesparentsfields_admin'),
('Estudiante', 'action_questionnairesparentsfields_admin'),
('College', 'action_questionnairesparentsfields_create'),
('Estudiante', 'action_questionnairesparentsfields_create'),
('College', 'action_questionnairesparentsfields_delete'),
('College', 'action_questionnairesparentsfields_index'),
('Estudiante', 'action_questionnairesparentsfields_index'),
('College', 'action_questionnairesparentsfields_update'),
('Estudiante', 'action_questionnairesparentsfields_update'),
('College', 'action_questionnairesparentsfields_view'),
('Estudiante', 'action_questionnairesparentsfields_view'),
('College', 'action_questionnairesstudentsfields_admin'),
('Estudiante', 'action_questionnairesstudentsfields_admin'),
('College', 'action_questionnairesstudentsfields_create'),
('Estudiante', 'action_questionnairesstudentsfields_create'),
('College', 'action_questionnairesstudentsfields_delete'),
('College', 'action_questionnairesstudentsfields_index'),
('Estudiante', 'action_questionnairesstudentsfields_index'),
('College', 'action_questionnairesstudentsfields_update'),
('Estudiante', 'action_questionnairesstudentsfields_update'),
('College', 'action_questionnairesstudentsfields_view'),
('Estudiante', 'action_questionnairesstudentsfields_view'),
('College', 'action_questionnaires_admin'),
('Estudiante', 'action_questionnaires_admin'),
('College', 'action_questionnaires_create'),
('Estudiante', 'action_questionnaires_create'),
('College', 'action_questionnaires_delete'),
('College', 'action_questionnaires_index'),
('Estudiante', 'action_questionnaires_index'),
('College', 'action_questionnaires_update'),
('Estudiante', 'action_questionnaires_update'),
('College', 'action_questionnaires_view'),
('Estudiante', 'action_questionnaires_view'),
('Analista_I', 'action_requirements_admin'),
('College', 'action_requirements_admin'),
('Analista_I', 'action_requirements_assign'),
('College', 'action_requirements_assign'),
('Analista_I', 'action_requirements_create'),
('College', 'action_requirements_create'),
('Analista_I', 'action_requirements_delete'),
('College', 'action_requirements_delete'),
('Aliado', 'action_requirements_index'),
('Analista_I', 'action_requirements_index'),
('College', 'action_requirements_index'),
('Analista_I', 'action_requirements_load'),
('College', 'action_requirements_load'),
('Analista_I', 'action_requirements_update'),
('College', 'action_requirements_update'),
('Analista_I', 'action_requirements_upload'),
('College', 'action_requirements_upload'),
('Aliado', 'action_requirements_view'),
('Analista_I', 'action_requirements_view'),
('College', 'action_requirements_view'),
('College', 'action_state_admin'),
('College', 'action_state_create'),
('College', 'action_state_delete'),
('College', 'action_state_index'),
('College', 'action_state_update'),
('College', 'action_state_view'),
('College', 'action_students_admin'),
('College', 'action_students_create'),
('College', 'action_students_delete'),
('College', 'action_students_index'),
('College', 'action_students_update'),
('College', 'action_students_view'),
('Aliado', 'action_ui_editprofile'),
('Analista_I', 'action_ui_editprofile'),
('College', 'action_ui_editprofile'),
('Estudiante', 'action_ui_editprofile'),
('College', 'action_ui_fieldsadmincreate'),
('College', 'action_ui_fieldsadmindelete'),
('College', 'action_ui_fieldsadminlist'),
('College', 'action_ui_fieldsadminupdate'),
('College', 'action_ui_rbacajaxassignment'),
('College', 'action_ui_rbacajaxsetchilditem'),
('College', 'action_ui_rbacauthitemchilditems'),
('College', 'action_ui_rbacauthitemcreate'),
('College', 'action_ui_rbacauthitemdelete'),
('College', 'action_ui_rbacauthitemupdate'),
('College', 'action_ui_rbaclistops'),
('College', 'action_ui_rbaclistroles'),
('College', 'action_ui_rbaclisttasks'),
('College', 'action_ui_rbacusersassignments'),
('College', 'action_ui_sessionadmin'),
('College', 'action_ui_systemupdate'),
('College', 'action_ui_usermanagementadmin'),
('College', 'action_ui_usermanagementcreate'),
('College', 'action_ui_usermanagementdelete'),
('College', 'action_ui_usermanagementupdate'),
('College', 'action_zones_admin'),
('College', 'action_zones_create'),
('College', 'action_zones_delete'),
('College', 'action_zones_index'),
('College', 'action_zones_update'),
('College', 'action_zones_view');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cruge_authitemchild`
--
ALTER TABLE `cruge_authitemchild`
  ADD CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
