ALTER TABLE `#__ropo_systems` ADD `transfer_interval` ENUM( 'DAYS', 'MONTHS', 'YEARS' ) NOT NULL AFTER `transfer_period`;