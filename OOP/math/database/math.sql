-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2016 at 09:22 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `math`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_ans`
--

CREATE TABLE IF NOT EXISTS `blog_ans` (
`ans_id` bigint(11) NOT NULL,
  `ans` text NOT NULL,
  `post_id` bigint(11) NOT NULL,
  `vote_for_ans` bigint(11) NOT NULL,
  `ans_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `blog_ans`
--

INSERT INTO `blog_ans` (`ans_id`, `ans`, `post_id`, `vote_for_ans`, `ans_status`, `created_at`) VALUES
(62, '<p>Hello !!!</p>\r\n', 1, 0, 1, '0000-00-00 00:00:00'),
(63, '<p>Hello !!!</p>\r\n', 2, 0, 1, '0000-00-00 00:00:00'),
(64, '<p>Hi bro.....!!!!!!!!!!!</p>\r\n', 3, 0, 1, '0000-00-00 00:00:00'),
(65, '<p>It&#39;s a comment.</p>\r\n', 1, 0, 1, '0000-00-00 00:00:00'),
(66, '<p>Hi bro....</p>\r\n', 2, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
`id` bigint(11) NOT NULL,
  `title` text NOT NULL,
  `posts` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `posts`, `category`, `post_status`, `created_at`) VALUES
(1, 'It''s a new feature added recently, you can see that on the last video on Laracast (https://laracasts.com/series/build-your-first-app-in-laravel/episodes/9).', 'Hi @stefr,It''s a new feature added recently, you can see that on the last video on Laracast (https://laracasts.com/series/build-your-first-app-in-laravel/episodes/9).If you don''t want a migration with your model you can just add the option --skip-migration on your command', 'Numerical', 1, '2016-05-01 03:09:10'),
(2, 'It''s a new feature added recently, you can see that on the last video on Laracast (https://laracasts.com/series/build-your-first-app-in-laravel/episodes/9).', '<p>Hi @stefr,It''s a new feature added recently, you can see that on the last video on Laracast (https://laracasts.com/series/build-your-first-app-in-laravel/episodes/9).If you don''t want a migration with your model you can just add the option --skip-migration on your command<p>', 'Statistics', 1, '2016-05-01 03:09:11'),
(3, 'It''s a new feature added recently, you can see that on the last video on Laracast (https://laracasts.com/series/build-your-first-app-in-laravel/episodes/9).', 'Hi @stefr,\r\n\r\nIt''s a new feature added recently, you can see that on the last video on Laracast (https://laracasts.com/series/build-your-first-app-in-laravel/episodes/9).\r\n\r\nIf you don''t want a migration with your model you can just add the option --skip-migration on your command', 'Numerical', 1, '0000-00-00 00:00:00'),
(4, 'It''s a new feature added recently, you can see that on the last video on Laracast (https://laracasts.com/series/build-your-first-app-in-laravel/episodes/9).', 'Hi @stefr,\r\n\r\nIt''s a new feature added recently, you can see that on the last video on Laracast (https://laracasts.com/series/build-your-first-app-in-laravel/episodes/9).\r\n\r\nIf you don''t want a migration with your model you can just add the option --skip-migration on your command', 'Statistics', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `equations`
--

CREATE TABLE IF NOT EXISTS `equations` (
`id` bigint(11) NOT NULL,
  `name_of_eqn` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `rel_page` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `equations`
--

INSERT INTO `equations` (`id`, `name_of_eqn`, `category`, `rel_page`) VALUES
(1, 'Arithmetic mean (Frequency distribution)', 'Statistics', 'equations/statistics/eqn/arithmeticmean_frequency.php'),
(2, 'Arithmetic mean (Class interval)', 'Statistics', 'equations/statistics/eqn/arithmeticmean_class.php'),
(3, 'Mean', 'Statistics', 'equations/statistics/eqn/mean.php'),
(4, 'Median (Ungrouped data)', 'Statistics', 'equations/statistics/eqn/median_ungrouped.php'),
(29, 'Median (Frequency distribution)', 'Statistics', 'equations/statistics/eqn/median_frequency.php'),
(30, 'Median Class frequency', 'numerical', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` bigint(20) NOT NULL,
  `news_head` text NOT NULL,
  `news_details` text NOT NULL,
  `news_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_head`, `news_details`, `news_time`) VALUES
(1, 'It is the news 1', 'A jury ruled Thursday that Google did not unfairly use parts of Java programming language, saving the tech giant from a possible multibillion-dollar verdict in a lawsuit brought by business software firm Oracle.\r\n\r\n\r\nThe retrial stemmed from a 2012 case in which Google also prevailed, and has been closely watched by the tech industry because of its implications for software innovation and copyright law.\r\n\r\nOracle sought billions in damages from Google over the search engine company’s use of Java programming language in its Android smartphone operating system.\r\n\r\nBut Google and its allies argued that extending copyright protection to bits of code, called application programming interfaces, or APIs, would threaten innovation.\r\n\r\nGoogle said in a statement that the verdict “represents a win for the Android ecosystem, for the Java programming community and for software developers who rely on open and free programming languages to build innovative consumer products.”\r\n\r\nOracle, which obtained Java when it acquired Sun Microsystems in 2009, had been seeking some $9 billion in damages.\r\n\r\nAfter Google prevailed in the first trial, Oracle appealed, and an appellate panel ruled in 2014 that the lower court had erred, sending the case between the two Silicon Valley titans back for a new trial.\r\n\r\nOracle said Thursday its battle was not over.\r\n\r\n“We strongly believe that Google developed Android by illegally copying core Java technology to rush into the mobile device market,” Oracle general counsel Dorian Daley said in an email.\r\n\r\n“Oracle brought this lawsuit to put a stop to Google’s illegal behavior,” he added.\r\n\r\n“We believe there are numerous grounds for appeal and we plan to bring this case back to the Federal Circuit on appeal.”\r\n\r\nSilicon Valley victory -\r\nPublic interest and industry groups hailed the verdict as a win for the software makers and technology innovators.\r\n\r\nSilicon Valley had been watching the case closely, since weaving open source code into software programs is commonplace and often eliminates a need to re-invent commands considered fundamental.\r\n\r\nAPIs are seen as snippets of code that simply direct one program to another, almost the way a restaurant menu points diners to meal options.\r\n\r\n“While the legal process may still be ongoing, this is an important win for software developers everywhere and it promotes innovation,” Computer and Communications Industry Association chief executive Ed Black said.\r\n\r\n“APIs are important building blocks for all software. Allowing copyright claims to block their use by third parties would have a chilling effect across the entire software industry.”\r\n\r\nThe CCIA describes itself as an international, nonprofit group representing a cross-section of the computer, communications and Internet industries.\r\n\r\n“Software developers always have been, and should continue to be, free to develop new products that are compatible with other pieces of software,” said John Bergmayer, senior staff attorney at public interest group Public Knowledge.\r\n\r\n“It’s been the norm in the software industry for decades. The jury’s verdict is a welcome dose of common sense.”', '2016-05-28 17:34:06'),
(2, 'It is the news 2', 'A jury ruled Thursday that Google did not unfairly use parts of Java programming language, saving the tech giant from a possible multibillion-dollar verdict in a lawsuit brought by business software firm Oracle.\r\n\r\n\r\nThe retrial stemmed from a 2012 case in which Google also prevailed, and has been closely watched by the tech industry because of its implications for software innovation and copyright law.\r\n\r\nOracle sought billions in damages from Google over the search engine company’s use of Java programming language in its Android smartphone operating system.\r\n\r\nBut Google and its allies argued that extending copyright protection to bits of code, called application programming interfaces, or APIs, would threaten innovation.\r\n\r\nGoogle said in a statement that the verdict “represents a win for the Android ecosystem, for the Java programming community and for software developers who rely on open and free programming languages to build innovative consumer products.”\r\n\r\nOracle, which obtained Java when it acquired Sun Microsystems in 2009, had been seeking some $9 billion in damages.\r\n\r\nAfter Google prevailed in the first trial, Oracle appealed, and an appellate panel ruled in 2014 that the lower court had erred, sending the case between the two Silicon Valley titans back for a new trial.\r\n\r\nOracle said Thursday its battle was not over.\r\n\r\n“We strongly believe that Google developed Android by illegally copying core Java technology to rush into the mobile device market,” Oracle general counsel Dorian Daley said in an email.\r\n\r\n“Oracle brought this lawsuit to put a stop to Google’s illegal behavior,” he added.\r\n\r\n“We believe there are numerous grounds for appeal and we plan to bring this case back to the Federal Circuit on appeal.”\r\n\r\nSilicon Valley victory -\r\nPublic interest and industry groups hailed the verdict as a win for the software makers and technology innovators.\r\n\r\nSilicon Valley had been watching the case closely, since weaving open source code into software programs is commonplace and often eliminates a need to re-invent commands considered fundamental.\r\n\r\nAPIs are seen as snippets of code that simply direct one program to another, almost the way a restaurant menu points diners to meal options.\r\n\r\n“While the legal process may still be ongoing, this is an important win for software developers everywhere and it promotes innovation,” Computer and Communications Industry Association chief executive Ed Black said.\r\n\r\n“APIs are important building blocks for all software. Allowing copyright claims to block their use by third parties would have a chilling effect across the entire software industry.”\r\n\r\nThe CCIA describes itself as an international, nonprofit group representing a cross-section of the computer, communications and Internet industries.\r\n\r\n“Software developers always have been, and should continue to be, free to develop new products that are compatible with other pieces of software,” said John Bergmayer, senior staff attorney at public interest group Public Knowledge.\r\n\r\n“It’s been the norm in the software industry for decades. The jury’s verdict is a welcome dose of common sense.”', '2016-05-28 17:34:12'),
(3, 'It is the news 3', 'A jury ruled Thursday that Google did not unfairly use parts of Java programming language, saving the tech giant from a possible multibillion-dollar verdict in a lawsuit brought by business software firm Oracle.\r\n\r\n\r\nThe retrial stemmed from a 2012 case in which Google also prevailed, and has been closely watched by the tech industry because of its implications for software innovation and copyright law.\r\n\r\nOracle sought billions in damages from Google over the search engine company’s use of Java programming language in its Android smartphone operating system.\r\n\r\nBut Google and its allies argued that extending copyright protection to bits of code, called application programming interfaces, or APIs, would threaten innovation.\r\n\r\nGoogle said in a statement that the verdict “represents a win for the Android ecosystem, for the Java programming community and for software developers who rely on open and free programming languages to build innovative consumer products.”\r\n\r\nOracle, which obtained Java when it acquired Sun Microsystems in 2009, had been seeking some $9 billion in damages.\r\n\r\nAfter Google prevailed in the first trial, Oracle appealed, and an appellate panel ruled in 2014 that the lower court had erred, sending the case between the two Silicon Valley titans back for a new trial.\r\n\r\nOracle said Thursday its battle was not over.\r\n\r\n“We strongly believe that Google developed Android by illegally copying core Java technology to rush into the mobile device market,” Oracle general counsel Dorian Daley said in an email.\r\n\r\n“Oracle brought this lawsuit to put a stop to Google’s illegal behavior,” he added.\r\n\r\n“We believe there are numerous grounds for appeal and we plan to bring this case back to the Federal Circuit on appeal.”\r\n\r\nSilicon Valley victory -\r\nPublic interest and industry groups hailed the verdict as a win for the software makers and technology innovators.\r\n\r\nSilicon Valley had been watching the case closely, since weaving open source code into software programs is commonplace and often eliminates a need to re-invent commands considered fundamental.\r\n\r\nAPIs are seen as snippets of code that simply direct one program to another, almost the way a restaurant menu points diners to meal options.\r\n\r\n“While the legal process may still be ongoing, this is an important win for software developers everywhere and it promotes innovation,” Computer and Communications Industry Association chief executive Ed Black said.\r\n\r\n“APIs are important building blocks for all software. Allowing copyright claims to block their use by third parties would have a chilling effect across the entire software industry.”\r\n\r\nThe CCIA describes itself as an international, nonprofit group representing a cross-section of the computer, communications and Internet industries.\r\n\r\n“Software developers always have been, and should continue to be, free to develop new products that are compatible with other pieces of software,” said John Bergmayer, senior staff attorney at public interest group Public Knowledge.\r\n\r\n“It’s been the norm in the software industry for decades. The jury’s verdict is a welcome dose of common sense.”', '2016-05-28 17:34:48'),
(4, 'It is the news 4', 'A jury ruled Thursday that Google did not unfairly use parts of Java programming language, saving the tech giant from a possible multibillion-dollar verdict in a lawsuit brought by business software firm Oracle.\r\n\r\n\r\nThe retrial stemmed from a 2012 case in which Google also prevailed, and has been closely watched by the tech industry because of its implications for software innovation and copyright law.\r\n\r\nOracle sought billions in damages from Google over the search engine company’s use of Java programming language in its Android smartphone operating system.\r\n\r\nBut Google and its allies argued that extending copyright protection to bits of code, called application programming interfaces, or APIs, would threaten innovation.\r\n\r\nGoogle said in a statement that the verdict “represents a win for the Android ecosystem, for the Java programming community and for software developers who rely on open and free programming languages to build innovative consumer products.”\r\n\r\nOracle, which obtained Java when it acquired Sun Microsystems in 2009, had been seeking some $9 billion in damages.\r\n\r\nAfter Google prevailed in the first trial, Oracle appealed, and an appellate panel ruled in 2014 that the lower court had erred, sending the case between the two Silicon Valley titans back for a new trial.\r\n\r\nOracle said Thursday its battle was not over.\r\n\r\n“We strongly believe that Google developed Android by illegally copying core Java technology to rush into the mobile device market,” Oracle general counsel Dorian Daley said in an email.\r\n\r\n“Oracle brought this lawsuit to put a stop to Google’s illegal behavior,” he added.\r\n\r\n“We believe there are numerous grounds for appeal and we plan to bring this case back to the Federal Circuit on appeal.”\r\n\r\nSilicon Valley victory -\r\nPublic interest and industry groups hailed the verdict as a win for the software makers and technology innovators.\r\n\r\nSilicon Valley had been watching the case closely, since weaving open source code into software programs is commonplace and often eliminates a need to re-invent commands considered fundamental.\r\n\r\nAPIs are seen as snippets of code that simply direct one program to another, almost the way a restaurant menu points diners to meal options.\r\n\r\n“While the legal process may still be ongoing, this is an important win for software developers everywhere and it promotes innovation,” Computer and Communications Industry Association chief executive Ed Black said.\r\n\r\n“APIs are important building blocks for all software. Allowing copyright claims to block their use by third parties would have a chilling effect across the entire software industry.”\r\n\r\nThe CCIA describes itself as an international, nonprofit group representing a cross-section of the computer, communications and Internet industries.\r\n\r\n“Software developers always have been, and should continue to be, free to develop new products that are compatible with other pieces of software,” said John Bergmayer, senior staff attorney at public interest group Public Knowledge.\r\n\r\n“It’s been the norm in the software industry for decades. The jury’s verdict is a welcome dose of common sense.”', '2016-05-28 17:34:53'),
(5, 'It is the news 5', 'A jury ruled Thursday that Google did not unfairly use parts of Java programming language, saving the tech giant from a possible multibillion-dollar verdict in a lawsuit brought by business software firm Oracle.\r\n\r\n\r\nThe retrial stemmed from a 2012 case in which Google also prevailed, and has been closely watched by the tech industry because of its implications for software innovation and copyright law.\r\n\r\nOracle sought billions in damages from Google over the search engine company’s use of Java programming language in its Android smartphone operating system.\r\n\r\nBut Google and its allies argued that extending copyright protection to bits of code, called application programming interfaces, or APIs, would threaten innovation.\r\n\r\nGoogle said in a statement that the verdict “represents a win for the Android ecosystem, for the Java programming community and for software developers who rely on open and free programming languages to build innovative consumer products.”\r\n\r\nOracle, which obtained Java when it acquired Sun Microsystems in 2009, had been seeking some $9 billion in damages.\r\n\r\nAfter Google prevailed in the first trial, Oracle appealed, and an appellate panel ruled in 2014 that the lower court had erred, sending the case between the two Silicon Valley titans back for a new trial.\r\n\r\nOracle said Thursday its battle was not over.\r\n\r\n“We strongly believe that Google developed Android by illegally copying core Java technology to rush into the mobile device market,” Oracle general counsel Dorian Daley said in an email.\r\n\r\n“Oracle brought this lawsuit to put a stop to Google’s illegal behavior,” he added.\r\n\r\n“We believe there are numerous grounds for appeal and we plan to bring this case back to the Federal Circuit on appeal.”\r\n\r\nSilicon Valley victory -\r\nPublic interest and industry groups hailed the verdict as a win for the software makers and technology innovators.\r\n\r\nSilicon Valley had been watching the case closely, since weaving open source code into software programs is commonplace and often eliminates a need to re-invent commands considered fundamental.\r\n\r\nAPIs are seen as snippets of code that simply direct one program to another, almost the way a restaurant menu points diners to meal options.\r\n\r\n“While the legal process may still be ongoing, this is an important win for software developers everywhere and it promotes innovation,” Computer and Communications Industry Association chief executive Ed Black said.\r\n\r\n“APIs are important building blocks for all software. Allowing copyright claims to block their use by third parties would have a chilling effect across the entire software industry.”\r\n\r\nThe CCIA describes itself as an international, nonprofit group representing a cross-section of the computer, communications and Internet industries.\r\n\r\n“Software developers always have been, and should continue to be, free to develop new products that are compatible with other pieces of software,” said John Bergmayer, senior staff attorney at public interest group Public Knowledge.\r\n\r\n“It’s been the norm in the software industry for decades. The jury’s verdict is a welcome dose of common sense.”', '2016-05-28 17:35:02'),
(6, 'It is the news 6', 'A jury ruled Thursday that Google did not unfairly use parts of Java programming language, saving the tech giant from a possible multibillion-dollar verdict in a lawsuit brought by business software firm Oracle.\r\n\r\n\r\nThe retrial stemmed from a 2012 case in which Google also prevailed, and has been closely watched by the tech industry because of its implications for software innovation and copyright law.\r\n\r\nOracle sought billions in damages from Google over the search engine company’s use of Java programming language in its Android smartphone operating system.\r\n\r\nBut Google and its allies argued that extending copyright protection to bits of code, called application programming interfaces, or APIs, would threaten innovation.\r\n\r\nGoogle said in a statement that the verdict “represents a win for the Android ecosystem, for the Java programming community and for software developers who rely on open and free programming languages to build innovative consumer products.”\r\n\r\nOracle, which obtained Java when it acquired Sun Microsystems in 2009, had been seeking some $9 billion in damages.\r\n\r\nAfter Google prevailed in the first trial, Oracle appealed, and an appellate panel ruled in 2014 that the lower court had erred, sending the case between the two Silicon Valley titans back for a new trial.\r\n\r\nOracle said Thursday its battle was not over.\r\n\r\n“We strongly believe that Google developed Android by illegally copying core Java technology to rush into the mobile device market,” Oracle general counsel Dorian Daley said in an email.\r\n\r\n“Oracle brought this lawsuit to put a stop to Google’s illegal behavior,” he added.\r\n\r\n“We believe there are numerous grounds for appeal and we plan to bring this case back to the Federal Circuit on appeal.”\r\n\r\nSilicon Valley victory -\r\nPublic interest and industry groups hailed the verdict as a win for the software makers and technology innovators.\r\n\r\nSilicon Valley had been watching the case closely, since weaving open source code into software programs is commonplace and often eliminates a need to re-invent commands considered fundamental.\r\n\r\nAPIs are seen as snippets of code that simply direct one program to another, almost the way a restaurant menu points diners to meal options.\r\n\r\n“While the legal process may still be ongoing, this is an important win for software developers everywhere and it promotes innovation,” Computer and Communications Industry Association chief executive Ed Black said.\r\n\r\n“APIs are important building blocks for all software. Allowing copyright claims to block their use by third parties would have a chilling effect across the entire software industry.”\r\n\r\nThe CCIA describes itself as an international, nonprofit group representing a cross-section of the computer, communications and Internet industries.\r\n\r\n“Software developers always have been, and should continue to be, free to develop new products that are compatible with other pieces of software,” said John Bergmayer, senior staff attorney at public interest group Public Knowledge.\r\n\r\n“It’s been the norm in the software industry for decades. The jury’s verdict is a welcome dose of common sense.”', '2016-05-28 17:35:07'),
(7, 'It is the news 7', 'A jury ruled Thursday that Google did not unfairly use parts of Java programming language, saving the tech giant from a possible multibillion-dollar verdict in a lawsuit brought by business software firm Oracle.\r\n\r\n\r\nThe retrial stemmed from a 2012 case in which Google also prevailed, and has been closely watched by the tech industry because of its implications for software innovation and copyright law.\r\n\r\nOracle sought billions in damages from Google over the search engine company’s use of Java programming language in its Android smartphone operating system.\r\n\r\nBut Google and its allies argued that extending copyright protection to bits of code, called application programming interfaces, or APIs, would threaten innovation.\r\n\r\nGoogle said in a statement that the verdict “represents a win for the Android ecosystem, for the Java programming community and for software developers who rely on open and free programming languages to build innovative consumer products.”\r\n\r\nOracle, which obtained Java when it acquired Sun Microsystems in 2009, had been seeking some $9 billion in damages.\r\n\r\nAfter Google prevailed in the first trial, Oracle appealed, and an appellate panel ruled in 2014 that the lower court had erred, sending the case between the two Silicon Valley titans back for a new trial.\r\n\r\nOracle said Thursday its battle was not over.\r\n\r\n“We strongly believe that Google developed Android by illegally copying core Java technology to rush into the mobile device market,” Oracle general counsel Dorian Daley said in an email.\r\n\r\n“Oracle brought this lawsuit to put a stop to Google’s illegal behavior,” he added.\r\n\r\n“We believe there are numerous grounds for appeal and we plan to bring this case back to the Federal Circuit on appeal.”\r\n\r\nSilicon Valley victory -\r\nPublic interest and industry groups hailed the verdict as a win for the software makers and technology innovators.\r\n\r\nSilicon Valley had been watching the case closely, since weaving open source code into software programs is commonplace and often eliminates a need to re-invent commands considered fundamental.\r\n\r\nAPIs are seen as snippets of code that simply direct one program to another, almost the way a restaurant menu points diners to meal options.\r\n\r\n“While the legal process may still be ongoing, this is an important win for software developers everywhere and it promotes innovation,” Computer and Communications Industry Association chief executive Ed Black said.\r\n\r\n“APIs are important building blocks for all software. Allowing copyright claims to block their use by third parties would have a chilling effect across the entire software industry.”\r\n\r\nThe CCIA describes itself as an international, nonprofit group representing a cross-section of the computer, communications and Internet industries.\r\n\r\n“Software developers always have been, and should continue to be, free to develop new products that are compatible with other pieces of software,” said John Bergmayer, senior staff attorney at public interest group Public Knowledge.\r\n\r\n“It’s been the norm in the software industry for decades. The jury’s verdict is a welcome dose of common sense.”', '2016-05-28 17:35:12'),
(8, 'It is the news 8', 'A jury ruled Thursday that Google did not unfairly use parts of Java programming language, saving the tech giant from a possible multibillion-dollar verdict in a lawsuit brought by business software firm Oracle.\r\n\r\n\r\nThe retrial stemmed from a 2012 case in which Google also prevailed, and has been closely watched by the tech industry because of its implications for software innovation and copyright law.\r\n\r\nOracle sought billions in damages from Google over the search engine company’s use of Java programming language in its Android smartphone operating system.\r\n\r\nBut Google and its allies argued that extending copyright protection to bits of code, called application programming interfaces, or APIs, would threaten innovation.\r\n\r\nGoogle said in a statement that the verdict “represents a win for the Android ecosystem, for the Java programming community and for software developers who rely on open and free programming languages to build innovative consumer products.”\r\n\r\nOracle, which obtained Java when it acquired Sun Microsystems in 2009, had been seeking some $9 billion in damages.\r\n\r\nAfter Google prevailed in the first trial, Oracle appealed, and an appellate panel ruled in 2014 that the lower court had erred, sending the case between the two Silicon Valley titans back for a new trial.\r\n\r\nOracle said Thursday its battle was not over.\r\n\r\n“We strongly believe that Google developed Android by illegally copying core Java technology to rush into the mobile device market,” Oracle general counsel Dorian Daley said in an email.\r\n\r\n“Oracle brought this lawsuit to put a stop to Google’s illegal behavior,” he added.\r\n\r\n“We believe there are numerous grounds for appeal and we plan to bring this case back to the Federal Circuit on appeal.”\r\n\r\nSilicon Valley victory -\r\nPublic interest and industry groups hailed the verdict as a win for the software makers and technology innovators.\r\n\r\nSilicon Valley had been watching the case closely, since weaving open source code into software programs is commonplace and often eliminates a need to re-invent commands considered fundamental.\r\n\r\nAPIs are seen as snippets of code that simply direct one program to another, almost the way a restaurant menu points diners to meal options.\r\n\r\n“While the legal process may still be ongoing, this is an important win for software developers everywhere and it promotes innovation,” Computer and Communications Industry Association chief executive Ed Black said.\r\n\r\n“APIs are important building blocks for all software. Allowing copyright claims to block their use by third parties would have a chilling effect across the entire software industry.”\r\n\r\nThe CCIA describes itself as an international, nonprofit group representing a cross-section of the computer, communications and Internet industries.\r\n\r\n“Software developers always have been, and should continue to be, free to develop new products that are compatible with other pieces of software,” said John Bergmayer, senior staff attorney at public interest group Public Knowledge.\r\n\r\n“It’s been the norm in the software industry for decades. The jury’s verdict is a welcome dose of common sense.”', '2016-05-28 17:35:17'),
(9, 'It is the news 9', 'A jury ruled Thursday that Google did not unfairly use parts of Java programming language, saving the tech giant from a possible multibillion-dollar verdict in a lawsuit brought by business software firm Oracle.\r\n\r\n\r\nThe retrial stemmed from a 2012 case in which Google also prevailed, and has been closely watched by the tech industry because of its implications for software innovation and copyright law.\r\n\r\nOracle sought billions in damages from Google over the search engine company’s use of Java programming language in its Android smartphone operating system.\r\n\r\nBut Google and its allies argued that extending copyright protection to bits of code, called application programming interfaces, or APIs, would threaten innovation.\r\n\r\nGoogle said in a statement that the verdict “represents a win for the Android ecosystem, for the Java programming community and for software developers who rely on open and free programming languages to build innovative consumer products.”\r\n\r\nOracle, which obtained Java when it acquired Sun Microsystems in 2009, had been seeking some $9 billion in damages.\r\n\r\nAfter Google prevailed in the first trial, Oracle appealed, and an appellate panel ruled in 2014 that the lower court had erred, sending the case between the two Silicon Valley titans back for a new trial.\r\n\r\nOracle said Thursday its battle was not over.\r\n\r\n“We strongly believe that Google developed Android by illegally copying core Java technology to rush into the mobile device market,” Oracle general counsel Dorian Daley said in an email.\r\n\r\n“Oracle brought this lawsuit to put a stop to Google’s illegal behavior,” he added.\r\n\r\n“We believe there are numerous grounds for appeal and we plan to bring this case back to the Federal Circuit on appeal.”\r\n\r\nSilicon Valley victory -\r\nPublic interest and industry groups hailed the verdict as a win for the software makers and technology innovators.\r\n\r\nSilicon Valley had been watching the case closely, since weaving open source code into software programs is commonplace and often eliminates a need to re-invent commands considered fundamental.\r\n\r\nAPIs are seen as snippets of code that simply direct one program to another, almost the way a restaurant menu points diners to meal options.\r\n\r\n“While the legal process may still be ongoing, this is an important win for software developers everywhere and it promotes innovation,” Computer and Communications Industry Association chief executive Ed Black said.\r\n\r\n“APIs are important building blocks for all software. Allowing copyright claims to block their use by third parties would have a chilling effect across the entire software industry.”\r\n\r\nThe CCIA describes itself as an international, nonprofit group representing a cross-section of the computer, communications and Internet industries.\r\n\r\n“Software developers always have been, and should continue to be, free to develop new products that are compatible with other pieces of software,” said John Bergmayer, senior staff attorney at public interest group Public Knowledge.\r\n\r\n“It’s been the norm in the software industry for decades. The jury’s verdict is a welcome dose of common sense.”', '2016-05-28 17:35:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_ans`
--
ALTER TABLE `blog_ans`
 ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equations`
--
ALTER TABLE `equations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_ans`
--
ALTER TABLE `blog_ans`
MODIFY `ans_id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `equations`
--
ALTER TABLE `equations`
MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
