#!/usr/bin/python
from __future__ import print_function
import zeep
import time

_start_time = time.time()
def tic():
    global _start_time 
    _start_time = time.time()

def tac():
    t_sec = round(time.time() - _start_time)
    (t_min, t_sec) = divmod(t_sec,60)
    (t_hour,t_min) = divmod(t_min,60) 
    print('Time passed: {}hour:{}min:{}sec'.format(t_hour,t_min,t_sec))

tic()
client = zeep.Client(wsdl="http://5.189.133.158:9101/MT4ManagerAPI?wsdl")

#manager = client.service.INITIAL_ADD_MANAGER( "216.158.89.2:443", 320, "abc.123", 1 )
manind = client.service.GET_MANAGER_CODE_BYMANAGERID(320)

#response = client.service.GET_HISTORY_REPORT(820037, "2015-11-04 15:46:04", "2016-08-14 00:00:00", manind)
response = client.service.GETUSERLIST(0, 0, manind)

print(repr(response))
tac()