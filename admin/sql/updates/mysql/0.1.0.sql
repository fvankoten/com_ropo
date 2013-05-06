UPDATE `#__ropo_systems` SET `state` = 'DELETED';
ALTER TABLE `#__ropo_systems` CHANGE `state` `state` ENUM( 'INVALID', 'VALID', 'eRECEIVED', 'pRECEIVED', 'REC_NOTIFIED', 'ASSIGNED', 'DECLINED', 'APPROVED', 'EXTENSION', 'DELETED' ) NULL DEFAULT 'INVALID';
UPDATE `#__ropo_systems` SET `state` = 'INVALID';