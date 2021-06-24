cmake_minimum_required(VERSION 2.8 FATAL_ERROR)

project(cloud_viewer)

set(CMAKE_CXX_FLAGS "${CMAKE_CXX_FLAGS} -std=c++11")
find_package(PCL  1.2 REQUIRED)

include_directories(${PCL_INCLUDE_DIRS})
link_directories(${PCL_LIBRARY_DIRS})
add_definitions(${PCL_DEFINITIONS})

add_executable (cloud_viewer cloud_viewer.cpp)
target_link_libraries (cloud_viewer ${PCL_LIBRARIES})
