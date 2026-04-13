-- Reseed services for Dontia (Dental + Skin Care). Categories: 15 = Dental Services, 16 = Skin Care
-- Requires admin/webroot/uploads/product/service-placeholder.png

SET NAMES utf8;
DELETE FROM `product_master`;

INSERT INTO `product_master` (`product_name`,`cat_id`,`pro_sub_cat_id`,`product_sub_sub_catid`,`meta_title`,`product_description`,`meta_tag`,`meta_description`,`page_title`,`pro_image`,`status`,`icon`,`citation`) VALUES
('Crown & Bridges',15,NULL,0,'Crown & Bridges','Restore functionality and aesthetics to damaged teeth.','Crown & Bridges','Restore functionality and aesthetics to damaged teeth.','Crown & Bridges','service-placeholder.png','active','','Yes'),
('Kids Dentistry',15,NULL,0,'Kids Dentistry','Friendly and gentle dental care for children.','Kids Dentistry','Friendly and gentle dental care for children.','Kids Dentistry','service-placeholder.png','active','','Yes'),
('TMJD Management',15,NULL,0,'TMJD Management','Relief from jaw pain and clicking with personalized TMJ dental care.','TMJD Management','Relief from jaw pain and clicking with personalized TMJ dental care.','TMJD Management','service-placeholder.png','active','','Yes'),
('Cavity Filling & Root Canal',15,NULL,0,'Cavity Filling & Root Canal','Treat decay and preserve your natural tooth.','Cavity Filling & Root Canal','Treat decay and preserve your natural tooth.','Cavity Filling & Root Canal','service-placeholder.png','active','','Yes'),
('Braces & Aligners',15,NULL,0,'Braces & Aligners','Aligned teeth using traditional or modern braces.','Braces & Aligners','Aligned teeth using traditional or modern braces.','Braces & Aligners','service-placeholder.png','active','','Yes'),
('Invisalign Aligners',15,NULL,0,'Invisalign Aligners','Clear, removable aligners for smile correction.','Invisalign Aligners','Clear, removable aligners for smile correction.','Invisalign Aligners','service-placeholder.png','active','','Yes'),

('Skin Analysis',16,NULL,0,'Skin Analysis','Personalized skin assessment for targeted treatment plans.','Skin Analysis','Personalized skin assessment for targeted treatment plans.','Skin Analysis','service-placeholder.png','active','','Yes'),
('Chemical Peels',16,NULL,0,'Chemical Peels','Improve skin tone and texture through gentle exfoliation.','Chemical Peels','Improve skin tone and texture through gentle exfoliation.','Chemical Peels','service-placeholder.png','active','','Yes'),
('Glow Drips',16,NULL,0,'Glow Drips','IV therapy to brighten and detoxify the skin.','Glow Drips','IV therapy to brighten and detoxify the skin.','Glow Drips','service-placeholder.png','active','','Yes'),
('MFT & Microneedling',16,NULL,0,'MFT & Microneedling','Stimulate collagen for skin tightening and scar healing.','MFT & Microneedling','Stimulate collagen for skin tightening and scar healing.','MFT & Microneedling','service-placeholder.png','active','','Yes'),
('Acne Management',16,NULL,0,'Acne Management','Professional treatments to control and prevent breakouts.','Acne Management','Professional treatments to control and prevent breakouts.','Acne Management','service-placeholder.png','active','','Yes'),
('Scar Management',16,NULL,0,'Scar Management','Minimize acne and injury-related scars effectively.','Scar Management','Minimize acne and injury-related scars effectively.','Scar Management','service-placeholder.png','active','','Yes'),
('Paediatric Skin Treatment',16,NULL,0,'Paediatric Skin Treatment','Specialized care for children''s skin issues.','Paediatric Skin Treatment','Specialized care for children''s skin issues.','Paediatric Skin Treatment','service-placeholder.png','active','','Yes'),
('Skin Booster',16,NULL,0,'Skin Booster','Injectable hydration for radiant and plump skin.','Skin Booster','Injectable hydration for radiant and plump skin.','Skin Booster','service-placeholder.png','active','','Yes'),
('MNRF Anti-Ageing',16,NULL,0,'MNRF Anti-Ageing','Radiofrequency-based rejuvenation for firmer skin.','MNRF Anti-Ageing','Radiofrequency-based rejuvenation for firmer skin.','MNRF Anti-Ageing','service-placeholder.png','active','','Yes'),
('Anti-Ageing Treatments',16,NULL,0,'Anti-Ageing Treatments','Target wrinkles and sagging with non-surgical solutions.','Anti-Ageing Treatments','Target wrinkles and sagging with non-surgical solutions.','Anti-Ageing Treatments','service-placeholder.png','active','','Yes'),
('Freckles & Melasma',16,NULL,0,'Freckles & Melasma','Treat pigmentation with advanced dermatological solutions.','Freckles & Melasma','Treat pigmentation with advanced dermatological solutions.','Freckles & Melasma','service-placeholder.png','active','','Yes'),
('Keloid Cryotherapy',16,NULL,0,'Keloid Cryotherapy','Freeze therapy to reduce keloid growths.','Keloid Cryotherapy','Freeze therapy to reduce keloid growths.','Keloid Cryotherapy','service-placeholder.png','active','','Yes'),
('Corn Removal',16,NULL,0,'Corn Removal','Effective and painless corn treatment.','Corn Removal','Effective and painless corn treatment.','Corn Removal','service-placeholder.png','active','','Yes'),
('Tattoo Removal',16,NULL,0,'Tattoo Removal','Laser technology to fade and remove tattoos.','Tattoo Removal','Laser technology to fade and remove tattoos.','Tattoo Removal','service-placeholder.png','active','','Yes'),
('Moles, Warts, Tags Removal',16,NULL,0,'Moles, Warts, Tags Removal','Safe removal of unwanted skin growths.','Moles, Warts, Tags Removal','Safe removal of unwanted skin growths.','Moles, Warts, Tags Removal','service-placeholder.png','active','','Yes'),
('Laser Hair Reduction',16,NULL,0,'Laser Hair Reduction','Painless, permanent hair removal with laser technology.','Laser Hair Reduction','Painless, permanent hair removal with laser technology.','Laser Hair Reduction','service-placeholder.png','active','','Yes'),
('Q-Switch Laser',16,NULL,0,'Q-Switch Laser','Remove pigmentation, freckles, and uneven skin tone.','Q-Switch Laser','Remove pigmentation, freckles, and uneven skin tone.','Q-Switch Laser','service-placeholder.png','active','','Yes'),
('Laser Regrowth',16,NULL,0,'Laser Regrowth','Laser therapy to boost hair regrowth naturally.','Laser Regrowth','Laser therapy to boost hair regrowth naturally.','Laser Regrowth','service-placeholder.png','active','','Yes'),
('PRP',16,NULL,0,'PRP','Natural skin regeneration using your body''s platelets.','PRP','Natural skin regeneration using your body''s platelets.','PRP','service-placeholder.png','active','','Yes'),
('PRP with GFC',16,NULL,0,'PRP with GFC','Advanced PRP with growth factors for faster healing.','PRP with GFC','Advanced PRP with growth factors for faster healing.','PRP with GFC','service-placeholder.png','active','','Yes'),
('Vampire Facial (Face PRP)',16,NULL,0,'Vampire Facial (Face PRP)','PRP facial to rejuvenate dull and aging skin.','Vampire Facial','PRP facial to rejuvenate dull and aging skin.','Vampire Facial (Face PRP)','service-placeholder.png','active','','Yes');
