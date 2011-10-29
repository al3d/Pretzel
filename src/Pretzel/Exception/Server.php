<?php if (!defined('PRETZEL_EXCEPTION')) exit('No Pretzel No Exception');



define('PRETZEL_EXCEPTION_SERVER', PRETZEL_EXCEPTION . '/Server');



class Pretzel_Exception_Server extends Pretzel_Exception
{



    static public function raise(PDOException $e)
    {
        switch($e->errorInfo[1]) {
            case 1000:
                $class = 'Hashchk';
                break;
            case 1001:
                $class = 'Nisamchk';
                break;
            case 1002:
                $class = 'No';
                break;
            case 1003:
                $class = 'Yes';
                break;
            case 1004:
                $class = 'CantCreateFile';
                break;
            case 1005:
                $class = 'CantCreateTable';
                break;
            case 1006:
                $class = 'CantCreateDb';
                break;
            case 1007:
                $class = 'DbCreateExists';
                break;
            case 1008:
                $class = 'DbDropExists';
                break;
            case 1009:
                $class = 'DbDropDelete';
                break;
            case 1010:
                $class = 'DbDropRmdir';
                break;
            case 1011:
                $class = 'CantDeleteFile';
                break;
            case 1012:
                $class = 'CantFindSystemRec';
                break;
            case 1013:
                $class = 'CantGetStat';
                break;
            case 1014:
                $class = 'CantGetWd';
                break;
            case 1015:
                $class = 'CantLock';
                break;
            case 1016:
                $class = 'CantOpenFile';
                break;
            case 1017:
                $class = 'FileNotFound';
                break;
            case 1018:
                $class = 'CantReadDir';
                break;
            case 1019:
                $class = 'CantSetWd';
                break;
            case 1020:
                $class = 'Checkread';
                break;
            case 1021:
                $class = 'DiskFull';
                break;
            case 1022:
                $class = 'DupKey';
                break;
            case 1023:
                $class = 'ErrorOnClose';
                break;
            case 1024:
                $class = 'ErrorOnRead';
                break;
            case 1025:
                $class = 'ErrorOnRename';
                break;
            case 1026:
                $class = 'ErrorOnWrite';
                break;
            case 1027:
                $class = 'FileUsed';
                break;
            case 1028:
                $class = 'FilsortAbort';
                break;
            case 1029:
                $class = 'FormNotFound';
                break;
            case 1030:
                $class = 'GetErrno';
                break;
            case 1031:
                $class = 'IllegalHa';
                break;
            case 1032:
                $class = 'KeyNotFound';
                break;
            case 1033:
                $class = 'NotFormFile';
                break;
            case 1034:
                $class = 'NotKeyfile';
                break;
            case 1035:
                $class = 'OldKeyfile';
                break;
            case 1036:
                $class = 'OpenAsReadonly';
                break;
            case 1037:
                $class = 'Outofmemory';
                break;
            case 1038:
                $class = 'OutOfSortmemory';
                break;
            case 1039:
                $class = 'UnexpectedEof';
                break;
            case 1040:
                $class = 'ConCountError';
                break;
            case 1041:
                $class = 'OutOfResources';
                break;
            case 1042:
                $class = 'BadHostError';
                break;
            case 1043:
                $class = 'HandshakeError';
                break;
            case 1044:
                $class = 'DbaccessDeniedError';
                break;
            case 1045:
                $class = 'AccessDeniedError';
                break;
            case 1046:
                $class = 'NoDbError';
                break;
            case 1047:
                $class = 'UnknownComError';
                break;
            case 1048:
                $class = 'BadNullError';
                break;
            case 1049:
                $class = 'BadDbError';
                break;
            case 1050:
                $class = 'TableExistsError';
                break;
            case 1051:
                $class = 'BadTableError';
                break;
            case 1052:
                $class = 'NonUniqError';
                break;
            case 1053:
                $class = 'ServerShutdown';
                break;
            case 1054:
                $class = 'BadFieldError';
                break;
            case 1055:
                $class = 'WrongFieldWithGroup';
                break;
            case 1056:
                $class = 'WrongGroupField';
                break;
            case 1057:
                $class = 'WrongSumSelect';
                break;
            case 1058:
                $class = 'WrongValueCount';
                break;
            case 1059:
                $class = 'TooLongIdent';
                break;
            case 1060:
                $class = 'DupFieldname';
                break;
            case 1061:
                $class = 'DupKeyname';
                break;
            case 1062:
                $class = 'DupEntry';
                break;
            case 1063:
                $class = 'WrongFieldSpec';
                break;
            case 1064:
                $class = 'ParseError';
                break;
            case 1065:
                $class = 'EmptyQuery';
                break;
            case 1066:
                $class = 'NonuniqTable';
                break;
            case 1067:
                $class = 'InvalidDefault';
                break;
            case 1068:
                $class = 'MultiplePriKey';
                break;
            case 1069:
                $class = 'TooManyKeys';
                break;
            case 1070:
                $class = 'TooManyKeyParts';
                break;
            case 1071:
                $class = 'TooLongKey';
                break;
            case 1072:
                $class = 'KeyColumnDoesNotExits';
                break;
            case 1073:
                $class = 'BlobUsedAsKey';
                break;
            case 1074:
                $class = 'TooBigFieldlength';
                break;
            case 1075:
                $class = 'WrongAutoKey';
                break;
            case 1076:
                $class = 'Ready';
                break;
            case 1077:
                $class = 'NormalShutdown';
                break;
            case 1078:
                $class = 'GotSignal';
                break;
            case 1079:
                $class = 'ShutdownComplete';
                break;
            case 1080:
                $class = 'ForcingClose';
                break;
            case 1081:
                $class = 'IpsockError';
                break;
            case 1082:
                $class = 'NoSuchIndex';
                break;
            case 1083:
                $class = 'WrongFieldTerminators';
                break;
            case 1084:
                $class = 'BlobsAndNoTerminated';
                break;
            case 1085:
                $class = 'TextfileNotReadable';
                break;
            case 1086:
                $class = 'FileExistsError';
                break;
            case 1087:
                $class = 'LoadInfo';
                break;
            case 1088:
                $class = 'AlterInfo';
                break;
            case 1089:
                $class = 'WrongSubKey';
                break;
            case 1090:
                $class = 'CantRemoveAllFields';
                break;
            case 1091:
                $class = 'CantDropFieldOrKey';
                break;
            case 1092:
                $class = 'InsertInfo';
                break;
            case 1093:
                $class = 'UpdateTableUsed';
                break;
            case 1094:
                $class = 'NoSuchThread';
                break;
            case 1095:
                $class = 'KillDeniedError';
                break;
            case 1096:
                $class = 'NoTablesUsed';
                break;
            case 1097:
                $class = 'TooBigSet';
                break;
            case 1098:
                $class = 'NoUniqueLogfile';
                break;
            case 1099:
                $class = 'TableNotLockedForWrite';
                break;
            case 1100:
                $class = 'TableNotLocked';
                break;
            case 1101:
                $class = 'BlobCantHaveDefault';
                break;
            case 1102:
                $class = 'WrongDbName';
                break;
            case 1103:
                $class = 'WrongTableName';
                break;
            case 1104:
                $class = 'TooBigSelect';
                break;
            case 1105:
                $class = 'UnknownError';
                break;
            case 1106:
                $class = 'UnknownProcedure';
                break;
            case 1107:
                $class = 'WrongParamcountToProcedure';
                break;
            case 1108:
                $class = 'WrongParametersToProcedure';
                break;
            case 1109:
                $class = 'UnknownTable';
                break;
            case 1110:
                $class = 'FieldSpecifiedTwice';
                break;
            case 1111:
                $class = 'InvalidGroupFuncUse';
                break;
            case 1112:
                $class = 'UnsupportedExtension';
                break;
            case 1113:
                $class = 'TableMustHaveColumns';
                break;
            case 1114:
                $class = 'RecordFileFull';
                break;
            case 1115:
                $class = 'UnknownCharacterSet';
                break;
            case 1116:
                $class = 'TooManyTables';
                break;
            case 1117:
                $class = 'TooManyFields';
                break;
            case 1118:
                $class = 'TooBigRowsize';
                break;
            case 1119:
                $class = 'StackOverrun';
                break;
            case 1120:
                $class = 'WrongOuterJoin';
                break;
            case 1121:
                $class = 'NullColumnInIndex';
                break;
            case 1122:
                $class = 'CantFindUdf';
                break;
            case 1123:
                $class = 'CantInitializeUdf';
                break;
            case 1124:
                $class = 'UdfNoPaths';
                break;
            case 1125:
                $class = 'UdfExists';
                break;
            case 1126:
                $class = 'CantOpenLibrary';
                break;
            case 1127:
                $class = 'CantFindDlEntry';
                break;
            case 1128:
                $class = 'FunctionNotDefined';
                break;
            case 1129:
                $class = 'HostIsBlocked';
                break;
            case 1130:
                $class = 'HostNotPrivileged';
                break;
            case 1131:
                $class = 'PasswordAnonymousUser';
                break;
            case 1132:
                $class = 'PasswordNotAllowed';
                break;
            case 1133:
                $class = 'PasswordNoMatch';
                break;
            case 1134:
                $class = 'UpdateInfo';
                break;
            case 1135:
                $class = 'CantCreateThread';
                break;
            case 1136:
                $class = 'WrongValueCountOnRow';
                break;
            case 1137:
                $class = 'CantReopenTable';
                break;
            case 1138:
                $class = 'InvalidUseOfNull';
                break;
            case 1139:
                $class = 'RegexpError';
                break;
            case 1140:
                $class = 'MixOfGroupFuncAndFields';
                break;
            case 1141:
                $class = 'NonexistingGrant';
                break;
            case 1142:
                $class = 'TableaccessDeniedError';
                break;
            case 1143:
                $class = 'ColumnaccessDeniedError';
                break;
            case 1144:
                $class = 'IllegalGrantForTable';
                break;
            case 1145:
                $class = 'GrantWrongHostOrUser';
                break;
            case 1146:
                $class = 'NoSuchTable';
                break;
            case 1147:
                $class = 'NonexistingTableGrant';
                break;
            case 1148:
                $class = 'NotAllowedCommand';
                break;
            case 1149:
                $class = 'SyntaxError';
                break;
            case 1150:
                $class = 'DelayedCantChangeLock';
                break;
            case 1151:
                $class = 'TooManyDelayedThreads';
                break;
            case 1152:
                $class = 'AbortingConnection';
                break;
            case 1153:
                $class = 'NetPacketTooLarge';
                break;
            case 1154:
                $class = 'NetReadErrorFromPipe';
                break;
            case 1155:
                $class = 'NetFcntlError';
                break;
            case 1156:
                $class = 'NetPacketsOutOfOrder';
                break;
            case 1157:
                $class = 'NetUncompressError';
                break;
            case 1158:
                $class = 'NetReadError';
                break;
            case 1159:
                $class = 'NetReadInterrupted';
                break;
            case 1160:
                $class = 'NetErrorOnWrite';
                break;
            case 1161:
                $class = 'NetWriteInterrupted';
                break;
            case 1162:
                $class = 'TooLongString';
                break;
            case 1163:
                $class = 'TableCantHandleBlob';
                break;
            case 1164:
                $class = 'TableCantHandleAutoIncrement';
                break;
            case 1165:
                $class = 'DelayedInsertTableLocked';
                break;
            case 1166:
                $class = 'WrongColumnName';
                break;
            case 1167:
                $class = 'WrongKeyColumn';
                break;
            case 1168:
                $class = 'WrongMrgTable';
                break;
            case 1169:
                $class = 'DupUnique';
                break;
            case 1170:
                $class = 'BlobKeyWithoutLength';
                break;
            case 1171:
                $class = 'PrimaryCantHaveNull';
                break;
            case 1172:
                $class = 'TooManyRows';
                break;
            case 1173:
                $class = 'RequiresPrimaryKey';
                break;
            case 1174:
                $class = 'NoRaidCompiled';
                break;
            case 1175:
                $class = 'UpdateWithoutKeyInSafeMode';
                break;
            case 1176:
                $class = 'KeyDoesNotExits';
                break;
            case 1177:
                $class = 'CheckNoSuchTable';
                break;
            case 1178:
                $class = 'CheckNotImplemented';
                break;
            case 1179:
                $class = 'CantDoThisDuringAnTransaction';
                break;
            case 1180:
                $class = 'ErrorDuringCommit';
                break;
            case 1181:
                $class = 'ErrorDuringRollback';
                break;
            case 1182:
                $class = 'ErrorDuringFlushLogs';
                break;
            case 1183:
                $class = 'ErrorDuringCheckpoint';
                break;
            case 1184:
                $class = 'NewAbortingConnection';
                break;
            case 1185:
                $class = 'DumpNotImplemented';
                break;
            case 1186:
                $class = 'FlushMasterBinlogClosed';
                break;
            case 1187:
                $class = 'IndexRebuild';
                break;
            case 1188:
                $class = 'Master';
                break;
            case 1189:
                $class = 'MasterNetRead';
                break;
            case 1190:
                $class = 'MasterNetWrite';
                break;
            case 1191:
                $class = 'FtMatchingKeyNotFound';
                break;
            case 1192:
                $class = 'LockOrActiveTransaction';
                break;
            case 1193:
                $class = 'UnknownSystemVariable';
                break;
            case 1194:
                $class = 'CrashedOnUsage';
                break;
            case 1195:
                $class = 'CrashedOnRepair';
                break;
            case 1196:
                $class = 'WarningNotCompleteRollback';
                break;
            case 1197:
                $class = 'TransCacheFull';
                break;
            case 1198:
                $class = 'SlaveMustStop';
                break;
            case 1199:
                $class = 'SlaveNotRunning';
                break;
            case 1200:
                $class = 'BadSlave';
                break;
            case 1201:
                $class = 'MasterInfo';
                break;
            case 1202:
                $class = 'SlaveThread';
                break;
            case 1203:
                $class = 'TooManyUserConnections';
                break;
            case 1204:
                $class = 'SetConstantsOnly';
                break;
            case 1205:
                $class = 'LockWaitTimeout';
                break;
            case 1206:
                $class = 'LockTableFull';
                break;
            case 1207:
                $class = 'ReadOnlyTransaction';
                break;
            case 1208:
                $class = 'DropDbWithReadLock';
                break;
            case 1209:
                $class = 'CreateDbWithReadLock';
                break;
            case 1210:
                $class = 'WrongArguments';
                break;
            case 1211:
                $class = 'NoPermissionToCreateUser';
                break;
            case 1212:
                $class = 'UnionTablesInDifferentDir';
                break;
            case 1213:
                $class = 'LockDeadlock';
                break;
            case 1214:
                $class = 'TableCantHandleFt';
                break;
            case 1215:
                $class = 'CannotAddForeign';
                break;
            case 1216:
                $class = 'NoReferencedRow';
                break;
            case 1217:
                $class = 'RowIsReferenced';
                break;
            case 1218:
                $class = 'ConnectToMaster';
                break;
            case 1219:
                $class = 'QueryOnMaster';
                break;
            case 1220:
                $class = 'ErrorWhenExecutingCommand';
                break;
            case 1221:
                $class = 'WrongUsage';
                break;
            case 1222:
                $class = 'WrongNumberOfColumnsInSelect';
                break;
            case 1223:
                $class = 'CantUpdateWithReadlock';
                break;
            case 1224:
                $class = 'MixingNotAllowed';
                break;
            case 1225:
                $class = 'DupArgument';
                break;
            case 1226:
                $class = 'UserLimitReached';
                break;
            case 1227:
                $class = 'SpecificAccessDeniedError';
                break;
            case 1228:
                $class = 'LocalVariable';
                break;
            case 1229:
                $class = 'GlobalVariable';
                break;
            case 1230:
                $class = 'NoDefault';
                break;
            case 1231:
                $class = 'WrongValueForVar';
                break;
            case 1232:
                $class = 'WrongTypeForVar';
                break;
            case 1233:
                $class = 'VarCantBeRead';
                break;
            case 1234:
                $class = 'CantUseOptionHere';
                break;
            case 1235:
                $class = 'NotSupportedYet';
                break;
            case 1236:
                $class = 'MasterFatalErrorReadingBinlog';
                break;
            case 1237:
                $class = 'SlaveIgnoredTable';
                break;
            case 1238:
                $class = 'IncorrectGlobalLocalVar';
                break;
            case 1239:
                $class = 'WrongFkDef';
                break;
            case 1240:
                $class = 'KeyRefDoNotMatchTableRef';
                break;
            case 1241:
                $class = 'OperandColumns';
                break;
            case 1242:
                $class = 'SubqueryNo1Row';
                break;
            case 1243:
                $class = 'UnknownStmtHandler';
                break;
            case 1244:
                $class = 'CorruptHelpDb';
                break;
            case 1245:
                $class = 'CyclicReference';
                break;
            case 1246:
                $class = 'AutoConvert';
                break;
            case 1247:
                $class = 'IllegalReference';
                break;
            case 1248:
                $class = 'DerivedMustHaveAlias';
                break;
            case 1249:
                $class = 'SelectReduced';
                break;
            case 1250:
                $class = 'TablenameNotAllowedHere';
                break;
            case 1251:
                $class = 'NotSupportedAuthMode';
                break;
            case 1252:
                $class = 'SpatialCantHaveNull';
                break;
            case 1253:
                $class = 'CollationCharsetMismatch';
                break;
            case 1254:
                $class = 'SlaveWasRunning';
                break;
            case 1255:
                $class = 'SlaveWasNotRunning';
                break;
            case 1256:
                $class = 'TooBigForUncompress';
                break;
            case 1257:
                $class = 'ZlibZMemError';
                break;
            case 1258:
                $class = 'ZlibZBufError';
                break;
            case 1259:
                $class = 'ZlibZDataError';
                break;
            case 1260:
                $class = 'CutValueGroupConcat';
                break;
            case 1261:
                $class = 'WarnTooFewRecords';
                break;
            case 1262:
                $class = 'WarnTooManyRecords';
                break;
            case 1263:
                $class = 'WarnNullToNotnull';
                break;
            case 1264:
                $class = 'WarnDataOutOfRange';
                break;
            case 1265:
                $class = 'WarnDataTruncated';
                break;
            case 1266:
                $class = 'WarnUsingOtherHandler';
                break;
            case 1267:
                $class = 'CantAggregate2collations';
                break;
            case 1268:
                $class = 'DropUser';
                break;
            case 1269:
                $class = 'RevokeGrants';
                break;
            case 1270:
                $class = 'CantAggregate3collations';
                break;
            case 1271:
                $class = 'CantAggregateNcollations';
                break;
            case 1272:
                $class = 'VariableIsNotStruct';
                break;
            case 1273:
                $class = 'UnknownCollation';
                break;
            case 1274:
                $class = 'SlaveIgnoredSslParams';
                break;
            case 1275:
                $class = 'ServerIsInSecureAuthMode';
                break;
            case 1276:
                $class = 'WarnFieldResolved';
                break;
            case 1277:
                $class = 'BadSlaveUntilCond';
                break;
            case 1278:
                $class = 'MissingSkipSlave';
                break;
            case 1279:
                $class = 'UntilCondIgnored';
                break;
            case 1280:
                $class = 'WrongNameForIndex';
                break;
            case 1281:
                $class = 'WrongNameForCatalog';
                break;
            case 1282:
                $class = 'WarnQcResize';
                break;
            case 1283:
                $class = 'BadFtColumn';
                break;
            case 1284:
                $class = 'UnknownKeyCache';
                break;
            case 1285:
                $class = 'WarnHostnameWontWork';
                break;
            case 1286:
                $class = 'UnknownStorageEngine';
                break;
            case 1287:
                $class = 'WarnDeprecatedSyntax';
                break;
            case 1288:
                $class = 'NonUpdatableTable';
                break;
            case 1289:
                $class = 'FeatureDisabled';
                break;
            case 1290:
                $class = 'OptionPreventsStatement';
                break;
            case 1291:
                $class = 'DuplicatedValueInType';
                break;
            case 1292:
                $class = 'TruncatedWrongValue';
                break;
            case 1293:
                $class = 'TooMuchAutoTimestampCols';
                break;
            case 1294:
                $class = 'InvalidOnUpdate';
                break;
            case 1295:
                $class = 'UnsupportedPs';
                break;
            case 1296:
                $class = 'GetErrmsg';
                break;
            case 1297:
                $class = 'GetTemporaryErrmsg';
                break;
            case 1298:
                $class = 'UnknownTimeZone';
                break;
            case 1299:
                $class = 'WarnInvalidTimestamp';
                break;
            case 1300:
                $class = 'InvalidCharacterString';
                break;
            case 1301:
                $class = 'WarnAllowedPacketOverflowed';
                break;
            case 1302:
                $class = 'ConflictingDeclarations';
                break;
            case 1303:
                $class = 'SpNoRecursiveCreate';
                break;
            case 1304:
                $class = 'SpAlreadyExists';
                break;
            case 1305:
                $class = 'SpDoesNotExist';
                break;
            case 1306:
                $class = 'SpDropFailed';
                break;
            case 1307:
                $class = 'SpStoreFailed';
                break;
            case 1308:
                $class = 'SpLilabelMismatch';
                break;
            case 1309:
                $class = 'SpLabelRedefine';
                break;
            case 1310:
                $class = 'SpLabelMismatch';
                break;
            case 1311:
                $class = 'SpUninitVar';
                break;
            case 1312:
                $class = 'SpBadselect';
                break;
            case 1313:
                $class = 'SpBadreturn';
                break;
            case 1314:
                $class = 'SpBadstatement';
                break;
            case 1315:
                $class = 'UpdateLogDeprecatedIgnored';
                break;
            case 1316:
                $class = 'UpdateLogDeprecatedTranslated';
                break;
            case 1317:
                $class = 'QueryInterrupted';
                break;
            case 1318:
                $class = 'SpWrongNoOfArgs';
                break;
            case 1319:
                $class = 'SpCondMismatch';
                break;
            case 1320:
                $class = 'SpNoreturn';
                break;
            case 1321:
                $class = 'SpNoreturnend';
                break;
            case 1322:
                $class = 'SpBadCursorQuery';
                break;
            case 1323:
                $class = 'SpBadCursorSelect';
                break;
            case 1324:
                $class = 'SpCursorMismatch';
                break;
            case 1325:
                $class = 'SpCursorAlreadyOpen';
                break;
            case 1326:
                $class = 'SpCursorNotOpen';
                break;
            case 1327:
                $class = 'SpUndeclaredVar';
                break;
            case 1328:
                $class = 'SpWrongNoOfFetchArgs';
                break;
            case 1329:
                $class = 'SpFetchNoData';
                break;
            case 1330:
                $class = 'SpDupParam';
                break;
            case 1331:
                $class = 'SpDupVar';
                break;
            case 1332:
                $class = 'SpDupCond';
                break;
            case 1333:
                $class = 'SpDupCurs';
                break;
            case 1334:
                $class = 'SpCantAlter';
                break;
            case 1335:
                $class = 'SpSubselectNyi';
                break;
            case 1336:
                $class = 'SpNoUse';
                break;
            case 1337:
                $class = 'SpVarcondAfterCurshndlr';
                break;
            case 1338:
                $class = 'SpCursorAfterHandler';
                break;
            case 1339:
                $class = 'SpCaseNotFound';
                break;
            case 1340:
                $class = 'FparserTooBigFile';
                break;
            case 1341:
                $class = 'FparserBadHeader';
                break;
            case 1342:
                $class = 'FparserEofInComment';
                break;
            case 1343:
                $class = 'FparserErrorInParameter';
                break;
            case 1344:
                $class = 'FparserEofInUnknownParameter';
                break;
            case 1345:
                $class = 'ViewNoExplain';
                break;
            case 1346:
                $class = 'FrmUnknownType';
                break;
            case 1347:
                $class = 'WrongObject';
                break;
            case 1348:
                $class = 'NonupdateableColumn';
                break;
            case 1349:
                $class = 'ViewSelectDerived';
                break;
            case 1350:
                $class = 'ViewSelectClause';
                break;
            case 1351:
                $class = 'ViewSelectVariable';
                break;
            case 1352:
                $class = 'ViewSelectTmptable';
                break;
            case 1353:
                $class = 'ViewWrongList';
                break;
            case 1354:
                $class = 'WarnViewMerge';
                break;
            case 1355:
                $class = 'WarnViewWithoutKey';
                break;
            case 1356:
                $class = 'ViewInvalid';
                break;
            case 1357:
                $class = 'SpNoDropSp';
                break;
            case 1358:
                $class = 'SpGotoInHndlr';
                break;
            case 1359:
                $class = 'TrgAlreadyExists';
                break;
            case 1360:
                $class = 'TrgDoesNotExist';
                break;
            case 1361:
                $class = 'TrgOnViewOrTempTable';
                break;
            case 1362:
                $class = 'TrgCantChangeRow';
                break;
            case 1363:
                $class = 'TrgNoSuchRowInTrg';
                break;
            case 1364:
                $class = 'NoDefaultForField';
                break;
            case 1365:
                $class = 'DivisionByZero';
                break;
            case 1366:
                $class = 'TruncatedWrongValueForField';
                break;
            case 1367:
                $class = 'IllegalValueForType';
                break;
            case 1368:
                $class = 'ViewNonupdCheck';
                break;
            case 1369:
                $class = 'ViewCheckFailed';
                break;
            default:
            	throw new self($e);
        }
        require_once PRETZEL_EXCEPTION_SERVER . '/' . $class . '.php';
        $class = 'Pretzel_Exception_Server_' . $class;
        throw new $class($e);
    }



}