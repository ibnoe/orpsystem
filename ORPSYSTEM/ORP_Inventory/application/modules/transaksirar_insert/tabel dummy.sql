


-- ----------------------------
-- Table structure for packaging2
-- ----------------------------
DROP TABLE IF EXISTS "public"."packaging2";
CREATE TABLE "public"."packaging2" (
"idpackaging" int4,
"nama" varchar(45) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of packaging2
-- ----------------------------
INSERT INTO "public"."packaging2" VALUES ('1', 'packaging1');
INSERT INTO "public"."packaging2" VALUES ('1', 'packaging1');
INSERT INTO "public"."packaging2" VALUES ('1', 'packaging1');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------

DROP TABLE IF EXISTS "public"."dopaket";
CREATE TABLE "public"."dopaket" (
"idpackaging" int4,
"iddeliveryorder" int4,
"nama" varchar(45) COLLATE "default"
)
WITH (OIDS=FALSE)

;

