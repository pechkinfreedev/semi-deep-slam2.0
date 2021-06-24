#!/bin/bash
FILEPATH="$( pwd )"
datapath=${FILEPATH}/data
echo ${datapath}
if [[ -d ${datapath} ]]; then
    echo "data directory exist"
else
    echo "No data directory "
fi
#cd ${FILEPATH}/ORB_SLAM2-semi/Examples/Monocular

#export PATH=/root/anaconda3/bin:$PATH
#source activate py36
#mono_semidense ../../Vocabulary/ORBvoc.bin TUM2.yaml ../../../data/rgbd_dataset_freiburg1_xyz

#./Examples/Monocular/mono_semidense ./Vocabulary/ORBvoc.bin ./Examples/Monocular/TUM2.yaml ./rgbd_dataset_freiburg1_xyz
./Examples/Monocular/mono_semidense  ./Vocabulary/ORBvoc.bin ./Examples/Monocular/TUM2.yaml ./rgbd_dataset_freiburg2_desk
#./pcl1.7-make/build/cloud_viewer ./data/semi_pointcloud.txt
