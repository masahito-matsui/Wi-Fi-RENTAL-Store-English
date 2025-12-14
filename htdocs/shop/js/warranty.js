function getNewWarrantyIn(pid, pcid) {
	var opid = pid;
	var opcid = pcid;
	var arr = new Array();
	//original product_id
	//em 1-2
	if(opid == 5) {
		//new product_id
		arr[0] = 37;
		//new product_class_id
		arr[1] = 45;
	//em 2-3
	} else if(opid == 6) {
		arr[0] = 38;
		arr[1] = 46;
	//em 3-4
	} else if(opid == 7) {
		arr[0] = 39;
		arr[1] = 47;
	//em 4-5
	} else if(opid == 8) {
		arr[0] = 40;
		arr[1] = 48;
	//em 5-6
	} else if(opid == 9) {
		arr[0] = 41;
		arr[1] = 49;
	//em 6-7
	} else if(opid == 10) {
		arr[0] = 42;
		arr[1] = 50;
	//em 7-8
	} else if(opid == 11) {
		arr[0] = 43;
		arr[1] = 51;
	//em 8-9
	} else if(opid == 12) {
		arr[0] = 44;
		arr[1] = 52;
	//em 9-10
	} else if(opid == 13) {
		arr[0] = 45;
		arr[1] = 53;
	//em 10-11
	} else if(opid == 14) {
		arr[0] = 46;
		arr[1] = 54;
	//em 11-12
	} else if(opid == 15) {
		arr[0] = 47;
		arr[1] = 55;
	//em 12-13
	} else if(opid == 16) {
		arr[0] = 48;
		arr[1] = 56;
	//em 13-14
	} else if(opid == 17) {
		arr[0] = 49;
		arr[1] = 57;
	//em 14-15
	} else if(opid == 18) {
		arr[0] = 50;
		arr[1] = 58;
	//em 2
	} else if(opid == 19) {
		arr[0] = 51;
		arr[1] = 59;
	//em 3
	} else if(opid == 20) {
		arr[0] = 52;
		arr[1] = 60;
	//em 4
	} else if(opid == 280) {
		arr[0] = 283;
		arr[1] = 291;
	//em 5
	} else if(opid == 281) {
		arr[0] = 284;
		arr[1] = 292;
	//em 6
	} else if(opid == 282) {
		arr[0] = 285;
		arr[1] = 293;
	//em ex 1day
	} else if(opid == 109) {
		arr[0] = 126;
		arr[1] = 134;
	//em ex 1_2
	} else if(opid == 110) {
		arr[0] = 127;
		arr[1] = 135;
	//em ex 2_3
	} else if(opid == 111) {
		arr[0] = 128;
		arr[1] = 136;
	//em ex 3_4
	} else if(opid == 112) {
		arr[0] = 129;
		arr[1] = 137;
	//em ex 4_5
	} else if(opid == 113) {
		arr[0] = 130;
		arr[1] = 138;
	//em ex 5_6
	} else if(opid == 114) {
		arr[0] = 131;
		arr[1] = 139;
	//em ex 6_7
	} else if(opid == 115) {
		arr[0] = 132;
		arr[1] = 140;
	//em ex 7_8
	} else if(opid == 116) {
		arr[0] = 133;
		arr[1] = 141;
	//em ex 8_9
	} else if(opid == 117) {
		arr[0] = 134;
		arr[1] = 142;
	//em ex 9_10
	} else if(opid == 118) {
		arr[0] = 135;
		arr[1] = 143;
	//em ex 10_11
	} else if(opid == 119) {
		arr[0] = 136;
		arr[1] = 144;
	//em ex 11_12
	} else if(opid == 120) {
		arr[0] = 137;
		arr[1] = 145;
	//em ex 12_13
	} else if(opid == 121) {
		arr[0] = 138;
		arr[1] = 146;
	//em ex 13_14
	} else if(opid == 122) {
		arr[0] = 139;
		arr[1] = 147;
	//em ex 14_15(1month)
	} else if(opid == 123) {
		arr[0] = 140;
		arr[1] = 148;
	//em ex 2month
	} else if(opid == 124) {
		arr[0] = 141;
		arr[1] = 149;
	//em ex 3month
	} else if(opid == 125) {
		arr[0] = 142;
		arr[1] = 150;
	//wm 1-2
	} else if(opid == 21) {
		arr[0] = 53;
		arr[1] = 61;
	//wm 2-3
	} else if(opid == 22) {
		arr[0] = 54;
		arr[1] = 62;
	//wm 3-4
	} else if(opid == 23) {
		arr[0] = 55;
		arr[1] = 63;
	//wm 4-5
	} else if(opid == 24) {
		arr[0] = 56;
		arr[1] = 64;
	//wm 5-6
	} else if(opid == 25) {
		arr[0] = 57;
		arr[1] = 65;
	//wm 6-7
	} else if(opid == 26) {
		arr[0] = 58;
		arr[1] = 66;
	//wm 7-8
	} else if(opid == 27) {
		arr[0] = 59;
		arr[1] = 67;
	//wm 8-9
	} else if(opid == 28) {
		arr[0] = 60;
		arr[1] = 68;
	//wm 9-10
	} else if(opid == 29) {
		arr[0] = 61;
		arr[1] = 69;
	//wm 10-11
	} else if(opid == 30) {
		arr[0] = 62;
		arr[1] = 70;
	//wm 11-12
	} else if(opid == 31) {
		arr[0] = 68;
		arr[1] = 76;
	//wm 12-13
	} else if(opid == 32) {
		arr[0] = 63;
		arr[1] = 71;
	//wm 13-14
	} else if(opid == 33) {
		arr[0] = 64;
		arr[1] = 72;
	//wm 14-15
	} else if(opid == 34) {
		arr[0] = 65;
		arr[1] = 73;
	//wm 2
	} else if(opid == 35) {
		arr[0] = 66;
		arr[1] = 74;
	//wm 3
	} else if(opid == 36) {
		arr[0] = 67;
		arr[1] = 75;
	//wm 4
	} else if(opid == 71) {
		arr[0] = 72;
		arr[1] = 80;
	//wm 5
	} else if(opid == 73) {
		arr[0] = 74;
		arr[1] = 82;
	//wm 6
	} else if(opid == 75) {
		arr[0] = 76;
		arr[1] = 84;
	//wm ex 1day
	} else if(opid == 143) {
		arr[0] =  163;
		arr[1] = 171;
	//wm ex 1-2
	} else if(opid == 144) {
		arr[0] =  164;
		arr[1] = 172;
	//wm ex 2-3
	} else if(opid == 145) {
		arr[0] =  165;
		arr[1] = 173;
	//wm ex 3-4
	} else if(opid == 146) {
		arr[0] =  166;
		arr[1] = 174;
	//wm ex 4-5
	} else if(opid == 147) {
		arr[0] =  167;
		arr[1] = 175;
	//wm ex 5-6
	} else if(opid == 148) {
		arr[0] =  168;
		arr[1] = 176;
	//wm ex 6-7
	} else if(opid == 149) {
		arr[0] =  169;
		arr[1] = 177;
	//wm ex 7-8
	} else if(opid == 150) {
		arr[0] =  170;
		arr[1] = 178;
	//wm ex 8-9
	} else if(opid == 151) {
		arr[0] =  171;
		arr[1] = 179;
	//wm ex 9-10
	} else if(opid == 152) {
		arr[0] =  172;
		arr[1] = 180;
	//wm ex 10-11
	} else if(opid == 153) {
		arr[0] =  173;
		arr[1] = 181;
	//wm ex 11-12
	} else if(opid == 154) {
		arr[0] =  174;
		arr[1] = 182;
	//wm ex 12-13
	} else if(opid == 155) {
		arr[0] =  175;
		arr[1] = 183;
	//wm ex 13-14
	} else if(opid == 156) {
		arr[0] =  176;
		arr[1] = 184;
	//wm ex 14-15(1month)
	} else if(opid == 157) {
		arr[0] =  177;
		arr[1] = 185;
	//wm ex 2month
	} else if(opid == 158) {
		arr[0] =  178;
		arr[1] = 186;
	//wm ex 3month
	} else if(opid == 159) {
		arr[0] =  179;
		arr[1] = 187;
	//wm ex 4month
	} else if(opid == 160) {
		arr[0] =  180;
		arr[1] = 188;
	//wm ex 5month
	} else if(opid == 161) {
		arr[0] =  181;
		arr[1] = 189;
	//wm ex 6month
	} else if(opid == 162) {
		arr[0] =  182;
		arr[1] = 190;
	//au 1-2
	} else if(opid == 77) {
		arr[0] = 93;
		arr[1] = 101;
	//au 2-3
	} else if(opid == 78) {
		arr[0] = 94;
		arr[1] = 102;
	//au 3-4
	} else if(opid == 79) {
		arr[0] = 95;
		arr[1] = 103;
	//au 4-5
	} else if(opid == 80) {
		arr[0] = 96;
		arr[1] = 104;
	//au 5-6
	} else if(opid == 81) {
		arr[0] = 97;
		arr[1] = 105;
	//au 6-7
	} else if(opid == 82) {
		arr[0] = 98;
		arr[1] = 106;
	//au 7-8
	} else if(opid == 83) {
		arr[0] = 99;
		arr[1] = 107;
	//au 8-9
	} else if(opid == 84) {
		arr[0] = 100;
		arr[1] = 108;
	//au 9-10
	} else if(opid == 85) {
		arr[0] = 101;
		arr[1] = 109;
	//au 10-11
	} else if(opid == 86) {
		arr[0] = 102;
		arr[1] = 110;
	//au 11-12
	} else if(opid == 87) {
		arr[0] = 103;
		arr[1] = 111;
	//au 12-13
	} else if(opid == 88) {
		arr[0] = 104;
		arr[1] = 112;
	//au 13-14
	} else if(opid == 89) {
		arr[0] = 105;
		arr[1] = 113;
	//au 14-15
	} else if(opid == 90) {
		arr[0] = 106;
		arr[1] = 114;
	//au 2
	} else if(opid == 91) {
		arr[0] = 107;
		arr[1] = 115;
	//au 3
	} else if(opid == 92) {
		arr[0] = 108;
		arr[1] = 116;
	//au ex 1day
	} else if(opid == 183) {
		arr[0] = 200;
		arr[1] = 208;
	//au ex 1-2
	} else if(opid == 184) {
		arr[0] = 201;
		arr[1] = 209;
	//au ex 2-3
	} else if(opid == 185) {
		arr[0] = 202;
		arr[1] = 210;
	//au ex 3-4
	} else if(opid == 186) {
		arr[0] = 203;
		arr[1] = 211;
	//au ex 4-5
	} else if(opid == 187) {
		arr[0] = 204;
		arr[1] = 212;
	//au ex 5-6
	} else if(opid == 188) {
		arr[0] = 205;
		arr[1] = 213;
	//au ex 6-7
	} else if(opid == 189) {
		arr[0] = 206;
		arr[1] = 214;
	//au ex 7-8
	} else if(opid == 190) {
		arr[0] = 207;
		arr[1] = 215;
	//au ex 8-9
	} else if(opid == 191) {
		arr[0] = 208;
		arr[1] = 216;
	//au ex 9-10
	} else if(opid == 192) {
		arr[0] = 209;
		arr[1] = 217;
	//au ex 10-11
	} else if(opid == 193) {
		arr[0] = 210;
		arr[1] = 218;
	//au ex 11-12
	} else if(opid == 194) {
		arr[0] = 211;
		arr[1] = 219;
	//au ex 12-13
	} else if(opid == 195) {
		arr[0] = 212;
		arr[1] = 220;
	//au ex 13-14
	} else if(opid == 196) {
		arr[0] = 213;
		arr[1] = 221;
	//au ex 14-15( 1month)
	} else if(opid == 197) {
		arr[0] = 214;
		arr[1] = 222;
	//au ex 2month
	} else if(opid == 198) {
		arr[0] = 215;
		arr[1] = 223;
	//au ex 3month
	} else if(opid == 199) {
		arr[0] = 216;
		arr[1] = 224;
	//softbank 1-2
	} else if(opid == 222) {
		arr[0] = 238;
		arr[1] = 246;
	//softbank 2-3
	} else if(opid == 223) {
		arr[0] = 239;
		arr[1] = 247;
	//softbank 3-4
	} else if(opid == 224) {
		arr[0] = 240;
		arr[1] = 248;
	//softbank 4-5
	} else if(opid == 225) {
		arr[0] = 241;
		arr[1] = 249;
	//softbank 5-6
	} else if(opid == 226) {
		arr[0] = 242;
		arr[1] = 250;
	//softbank 6-7
	} else if(opid == 227) {
		arr[0] = 243;
		arr[1] = 251;
	//softbank 7-8
	} else if(opid == 228) {
		arr[0] = 244;
		arr[1] = 252;
	//softbank 8-9
	} else if(opid == 229) {
		arr[0] = 245;
		arr[1] = 253;
	//softbank 9-10
	} else if(opid == 230) {
		arr[0] = 246;
		arr[1] = 254;
	//softbank 10-11
	} else if(opid == 231) {
		arr[0] = 247;
		arr[1] = 255;
	//softbank 11-12
	} else if(opid == 232) {
		arr[0] = 248;
		arr[1] = 256;
	//softbank 12-13
	} else if(opid == 233) {
		arr[0] = 249;
		arr[1] = 257;
	//softbank 13-14
	} else if(opid == 234) {
		arr[0] = 250;
		arr[1] = 258;
	//softbank 14-15
	} else if(opid == 235) {
		arr[0] = 251;
		arr[1] = 259;
	//softbank 2
	} else if(opid == 236) {
		arr[0] = 252;
		arr[1] = 260;
	//softbank 3
	} else if(opid == 237) {
		arr[0] = 253;
		arr[1] = 261;
	//softbank 4
	} else if(opid == 271) {
		arr[0] = 274;
		arr[1] = 282;
	//softbank 5
	} else if(opid == 272) {
		arr[0] = 275;
		arr[1] = 283;
	//softbank 6
	} else if(opid == 273) {
		arr[0] = 276;
		arr[1] = 284;
	} else {
		arr[0] = opid;
		arr[1] = opcid;
	}
	return arr;
}

function getNewWarrantyOut(pid, pcid) {
	var opid = pid;
	var opcid = pcid;
	var arr = new Array();
	//em 1-2
	if(opid == 37) {
		arr[0] = 5;
		arr[1] = 13;
	//em 2-3
	} else if(opid == 38) {
		arr[0] = 6;
		arr[1] = 14;
	//em 3-4
	} else if(opid == 39) {
		arr[0] = 7;
		arr[1] = 15;
	//em 4-5
	} else if(opid == 40) {
		arr[0] = 8;
		arr[1] = 16;
	//em 5-6
	} else if(opid == 41) {
		arr[0] = 9;
		arr[1] = 17;
	//em 6-7
	} else if(opid == 42) {
		arr[0] = 10;
		arr[1] = 18;
	//em 7-8
	} else if(opid == 43) {
		arr[0] = 11;
		arr[1] = 19;
	//em 8-9
	} else if(opid == 44) {
		arr[0] = 12;
		arr[1] = 20;
	//em 9-10
	} else if(opid == 45) {
		arr[0] = 13;
		arr[1] = 21;
	//em 10-11
	} else if(opid == 46) {
		arr[0] = 14;
		arr[1] = 22;
	//em 11-12
	} else if(opid == 47) {
		arr[0] = 15;
		arr[1] = 23;
	//em 12-13
	} else if(opid == 48) {
		arr[0] = 16;
		arr[1] = 24;
	//em 13-14
	} else if(opid == 49) {
		arr[0] = 17;
		arr[1] = 25;
	//em 14-15
	} else if(opid == 50) {
		arr[0] = 18;
		arr[1] = 26;
	//em 2
	} else if(opid == 51) {
		arr[0] = 19;
		arr[1] = 27;
	//em 3
	} else if(opid == 52) {
		arr[0] = 20;
		arr[1] = 28;
	//em 4
	} else if(opid == 283) {
		arr[0] = 280;
		arr[1] = 288;
	//em 5
	} else if(opid == 284) {
		arr[0] = 281;
		arr[1] = 289;
	//em 6
	} else if(opid == 285) {
		arr[0] = 282;
		arr[1] = 290;
	//em ex 1day
	} else if(opid == 126) {
		arr[0] = 109;
		arr[1] = 117;
	//em ex 1-2
	} else if(opid == 127) {
		arr[0] = 110;
		arr[1] = 118;
	//em ex 2-3
	} else if(opid == 128) {
		arr[0] = 111;
		arr[1] = 119;
	//em ex 3-4
	} else if(opid == 129) {
		arr[0] = 112;
		arr[1] = 120;
	//em ex 4-5
	} else if(opid == 130) {
		arr[0] = 113;
		arr[1] = 121;
	//em ex 5-6
	} else if(opid == 131) {
		arr[0] = 114;
		arr[1] = 122;
	//em ex 6-7
	} else if(opid == 132) {
		arr[0] = 115;
		arr[1] = 123;
	//em ex 7-8
	} else if(opid == 133) {
		arr[0] = 116;
		arr[1] = 124;
	//em ex 8-9
	} else if(opid == 134) {
		arr[0] = 117;
		arr[1] = 125;
	//em ex 9-10
	} else if(opid == 135) {
		arr[0] = 118;
		arr[1] = 126;
	//em ex 10-11
	} else if(opid == 136) {
		arr[0] = 119;
		arr[1] = 127;
	//em ex 11-12
	} else if(opid == 137) {
		arr[0] = 120;
		arr[1] = 128;
	//em ex 12-13
	} else if(opid == 138) {
		arr[0] = 121;
		arr[1] = 129;
	//em ex 13-14
	} else if(opid == 139) {
		arr[0] = 122;
		arr[1] = 130;
	//em ex 14-15(1month)
	} else if(opid == 140) {
		arr[0] = 123;
		arr[1] = 131;
	//em ex 2month
	} else if(opid == 141) {
		arr[0] = 124;
		arr[1] = 132;
	//em ex 3month
	} else if(opid == 142) {
		arr[0] = 125;
		arr[1] = 133;
	//wm 1-2
	} else if(opid == 53) {
		arr[0] = 21;
		arr[1] = 29;
	//wm 2-3
	} else if(opid == 54) {
		arr[0] = 22;
		arr[1] = 30;
	//wm 3-4
	} else if(opid == 55) {
		arr[0] = 23;
		arr[1] = 31;
	//wm 4-5
	} else if(opid == 56) {
		arr[0] = 24;
		arr[1] = 32;
	//wm 5-6
	} else if(opid == 57) {
		arr[0] = 25;
		arr[1] = 33;
	//wm 6-7
	} else if(opid == 58) {
		arr[0] = 26;
		arr[1] = 34;
	//wm 7-8
	} else if(opid == 59) {
		arr[0] = 27;
		arr[1] = 35;
	//wm 8-9
	} else if(opid == 60) {
		arr[0] = 28;
		arr[1] = 36;
	//wm 9-10
	} else if(opid == 61) {
		arr[0] = 29;
		arr[1] = 37;
	//wm 10-11
	} else if(opid == 62) {
		arr[0] = 30;
		arr[1] = 38;
	//wm 11-12
	} else if(opid == 68) {
		arr[0] = 31;
		arr[1] = 39;
	//wm 12-13
	} else if(opid == 63) {
		arr[0] = 32;
		arr[1] = 40;
	//wm 13-14
	} else if(opid == 64) {
		arr[0] = 33;
		arr[1] = 41;
	//wm 14-15
	} else if(opid == 65) {
		arr[0] = 34;
		arr[1] = 42;
	//wm 2
	} else if(opid == 66) {
		arr[0] = 35;
		arr[1] = 43;
	//wm 3
	} else if(opid == 67) {
		arr[0] = 36;
		arr[1] = 44;
	//wm 4
	} else if(opid == 72) {
		arr[0] = 71;
		arr[1] = 79;
	//wm 5
	} else if(opid == 74) {
		arr[0] = 73;
		arr[1] = 81;
	//wm 6
	} else if(opid == 76) {
		arr[0] = 75;
		arr[1] = 83;
	//wm ex 1day
	} else if(opid == 163) {
		arr[0] = 143;
		arr[1] = 151;
	//wm ex 1-2
	} else if(opid == 164) {
		arr[0] = 144;
		arr[1] = 152;
	//wm ex 2-3
	} else if(opid == 165) {
		arr[0] = 145;
		arr[1] = 153;
	//wm ex 3-4
	} else if(opid == 166) {
		arr[0] = 146;
		arr[1] = 154;
	//wm ex 4-5
	} else if(opid == 167) {
		arr[0] = 147;
		arr[1] = 155;
	//wm ex 5-6
	} else if(opid == 168) {
		arr[0] = 148;
		arr[1] = 156;
	//wm ex 6-7
	} else if(opid == 169) {
		arr[0] = 149;
		arr[1] = 157;
	//wm ex 7-8
	} else if(opid == 170) {
		arr[0] = 150;
		arr[1] = 158;
	//wm ex 8-9
	} else if(opid == 171) {
		arr[0] = 151;
		arr[1] = 159;
	//wm ex 9-10
	} else if(opid == 172) {
		arr[0] = 152;
		arr[1] = 160;
	//wm ex 10-11
	} else if(opid == 173) {
		arr[0] = 153;
		arr[1] = 161;
	//wm ex 11-12
	} else if(opid == 174) {
		arr[0] = 154;
		arr[1] = 162;
	//wm ex 12-13
	} else if(opid == 175) {
		arr[0] = 155;
		arr[1] = 163;
	//wm ex 13-14
	} else if(opid == 176) {
		arr[0] = 156;
		arr[1] = 164;
	//wm ex 14-15(1month)
	} else if(opid == 177) {
		arr[0] = 157;
		arr[1] = 165;
	//wm ex 2month
	} else if(opid == 178) {
		arr[0] = 158;
		arr[1] = 166;
	//wm ex 3month
	} else if(opid == 179) {
		arr[0] = 159;
		arr[1] = 167;
	//wm ex 4month
	} else if(opid == 180) {
		arr[0] = 160;
		arr[1] = 168;
	//wm ex 5month
	} else if(opid == 181) {
		arr[0] = 161;
		arr[1] = 169;
	//wm ex 6month
	} else if(opid == 182) {
		arr[0] = 162;
		arr[1] = 170;
	//au 1-2
	} else if(opid == 93) {
		arr[0] = 77;
		arr[1] = 85;
	//au 2-3
	} else if(opid == 94) {
		arr[0] = 78;
		arr[1] = 86;
	//au 3-4
	} else if(opid == 95) {
		arr[0] = 79;
		arr[1] = 87;
	//au 4-5
	} else if(opid == 96) {
		arr[0] = 80;
		arr[1] = 88;
	//au 5-6
	} else if(opid == 97) {
		arr[0] = 81;
		arr[1] = 89;
	//au 6-7
	} else if(opid == 98) {
		arr[0] = 82;
		arr[1] = 90;
	//au 7-8
	} else if(opid == 99) {
		arr[0] = 83;
		arr[1] = 91;
	//au 8-9
	} else if(opid == 100) {
		arr[0] = 84;
		arr[1] = 92;
	//au 9-10
	} else if(opid == 101) {
		arr[0] = 85;
		arr[1] = 93;
	//au 10-11
	} else if(opid == 102) {
		arr[0] = 86;
		arr[1] = 94;
	//au 11-12
	} else if(opid == 103) {
		arr[0] = 87;
		arr[1] = 95;
	//au 12-13
	} else if(opid == 104) {
		arr[0] = 88;
		arr[1] = 96;
	//au 13-14
	} else if(opid == 105) {
		arr[0] = 89;
		arr[1] = 97;
	//au 14-15
	} else if(opid == 106) {
		arr[0] = 90;
		arr[1] = 98;
	//au 2
	} else if(opid == 107) {
		arr[0] = 91;
		arr[1] = 99;
	//au 3
	} else if(opid == 108) {
		arr[0] = 92;
		arr[1] = 100;
	//au ex 1day
	} else if(opid == 200) {
		arr[0] = 183;
		arr[1] = 191;
	//au ex 1-2
	} else if(opid == 201) {
		arr[0] = 184;
		arr[1] = 192;
	//au ex 2-3
	} else if(opid == 202) {
		arr[0] = 185;
		arr[1] = 193;
	//au ex 3-4
	} else if(opid == 203) {
		arr[0] = 186;
		arr[1] = 194;
	//au ex 4-5
	} else if(opid == 204) {
		arr[0] = 187;
		arr[1] = 195;
	//au ex 5-6
	} else if(opid == 205) {
		arr[0] = 188;
		arr[1] = 196;
	//au ex 6-7
	} else if(opid == 206) {
		arr[0] = 189;
		arr[1] = 197;
	//au ex 7-8
	} else if(opid == 207) {
		arr[0] = 190;
		arr[1] = 198;
	//au ex 8-9
	} else if(opid == 208) {
		arr[0] = 191;
		arr[1] = 199;
	//au ex 9-10
	} else if(opid == 209) {
		arr[0] = 192;
		arr[1] = 200;
	//au ex 10-11
	} else if(opid == 210) {
		arr[0] = 193;
		arr[1] = 201;
	//au ex 11-12
	} else if(opid == 211) {
		arr[0] = 194;
		arr[1] = 202;
	//au ex 12-13
	} else if(opid == 212) {
		arr[0] = 195;
		arr[1] = 203;
	//au ex 13-14
	} else if(opid == 213) {
		arr[0] = 196;
		arr[1] = 204;
	//au ex 14-15(1month)
	} else if(opid == 214) {
		arr[0] = 197;
		arr[1] = 205;
	//au ex 2month
	} else if(opid == 215) {
		arr[0] = 198;
		arr[1] = 206;
	//au ex 3month
	} else if(opid == 216) {
		arr[0] = 199;
		arr[1] = 207;
	//softbank 1-2
	} else if(opid == 238) {
		arr[0] = 222;
		arr[1] = 230;
	//softbank 2-3
	} else if(opid == 239) {
		arr[0] = 223;
		arr[1] = 231;
	//softbank 3-4
	} else if(opid == 240) {
		arr[0] = 224;
		arr[1] = 232;
	//softbank 4-5
	} else if(opid == 241) {
		arr[0] = 225;
		arr[1] = 233;
	//softbank 5-6
	} else if(opid == 242) {
		arr[0] = 226;
		arr[1] = 234;
	//softbank 6-7
	} else if(opid == 243) {
		arr[0] = 227;
		arr[1] = 235;
	//softbank 7-8
	} else if(opid == 244) {
		arr[0] = 228;
		arr[1] = 236;
	//softbank 8-9
	} else if(opid == 245) {
		arr[0] = 229;
		arr[1] = 237;
	//softbank 9-10
	} else if(opid == 246) {
		arr[0] = 230;
		arr[1] = 238;
	//softbank 10-11
	} else if(opid == 247) {
		arr[0] = 231;
		arr[1] = 239;
	//softbank 11-12
	} else if(opid == 248) {
		arr[0] = 232;
		arr[1] = 240;
	//softbank 12-13
	} else if(opid == 249) {
		arr[0] = 233;
		arr[1] = 241;
	//softbank 13-14
	} else if(opid == 250) {
		arr[0] = 234;
		arr[1] = 242;
	//softbank 14-15
	} else if(opid == 251) {
		arr[0] = 235;
		arr[1] = 243;
	//softbank 2
	} else if(opid == 252) {
		arr[0] = 236;
		arr[1] = 244;
	//softbank 3
	} else if(opid == 253) {
		arr[0] = 237;
		arr[1] = 245;
	//softbank 4
	} else if(opid == 274) {
		arr[0] = 271;
		arr[1] = 279;
	//softbank 5
	} else if(opid == 275) {
		arr[0] = 272;
		arr[1] = 280;
	//softbank 6
	} else if(opid == 276) {
		arr[0] = 273;
		arr[1] = 281;
	} else {
		arr[0] = opid;
		arr[1] = opcid;
	}
	return arr;
}

/*
$(document).ready(function(){
	var opid = $(':hidden[name="product_id"]').val();
	var arr = getNewWarranty(opid);
	$(':hidden[name="product_id"]').val(arr[0]);
	$(':hidden[name="product_class_id"]').val(arr[1]);
});
*/

$('#warranty_in').change(function(){
	var opid = $(':hidden[name="product_id"]').val();
	var opcid = $(':hidden[name="product_class_id"]').val();
	var arr = getNewWarrantyIn(opid, opcid);
	if ($(this).is(':checked')) {
		$(':hidden[name="product_id"]').val(arr[0]);
		$(':hidden[name="product_class_id"]').val(arr[1]);
	}
});
$('#warranty_out').change(function(){
	var opid = $(':hidden[name="product_id"]').val();
	var opcid = $(':hidden[name="product_class_id"]').val();
	var arr = getNewWarrantyOut(opid, opcid);
	if ($(this).is(':checked')) {
		$(':hidden[name="product_id"]').val(arr[0]);
		$(':hidden[name="product_class_id"]').val(arr[1]);
	}
});

function checkWarranty() {
	var win = $('#warranty_in').is(':checked');
	var wout = $('#warranty_out').is(':checked');
	if((win != true) && (wout != true)) {
		$("#id_war").removeClass("nodisp");
	} else {
		document.form1.submit();
	}
}
