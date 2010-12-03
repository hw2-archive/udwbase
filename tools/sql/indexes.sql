CREATE INDEX `udwbase` ON `creature_loot_template`     (`mincountOrRef`);
CREATE INDEX `udwbase` ON `disenchant_loot_template`   (`mincountOrRef`);
CREATE INDEX `udwbase` ON `fishing_loot_template`      (`mincountOrRef`);
CREATE INDEX `udwbase` ON `gameobject_loot_template`   (`mincountOrRef`);
CREATE INDEX `udwbase` ON `item_loot_template`         (`mincountOrRef`);
CREATE INDEX `udwbase` ON `pickpocketing_loot_template`(`mincountOrRef`);
CREATE INDEX `udwbase` ON `prospecting_loot_template`  (`mincountOrRef`);
CREATE INDEX `udwbase` ON `skinning_loot_template`     (`mincountOrRef`);
CREATE INDEX `udwbase` ON `reference_loot_template`    (`mincountOrRef`);

CREATE INDEX `udwbase_item` ON `creature_loot_template`     (`item`);
CREATE INDEX `udwbase_item` ON `disenchant_loot_template`   (`item`);
CREATE INDEX `udwbase_item` ON `fishing_loot_template`      (`item`);
CREATE INDEX `udwbase_item` ON `gameobject_loot_template`   (`item`);
CREATE INDEX `udwbase_item` ON `item_loot_template`         (`item`);
CREATE INDEX `udwbase_item` ON `pickpocketing_loot_template`(`item`);
CREATE INDEX `udwbase_item` ON `prospecting_loot_template`  (`item`);
CREATE INDEX `udwbase_item` ON `skinning_loot_template`     (`item`);
CREATE INDEX `udwbase_item` ON `reference_loot_template`    (`item`);

CREATE INDEX `udwbase_lootid`         ON `creature_template` (`lootid`);
CREATE INDEX `udwbase_skinloot`       ON `creature_template` (`skinloot`);
CREATE INDEX `udwbase_pickpocketloot` ON `creature_template` (`pickpocketloot`);
CREATE INDEX `udwbase_faction_A`      ON `creature_template` (`faction_A`);

CREATE INDEX `udwbase_faction`        ON `item_template`     (`RequiredReputationFaction`);
